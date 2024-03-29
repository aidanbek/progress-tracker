<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::Parent()
            ->with('tasks')
            ->orderBy('id')
            ->get()
            ->toArray();

        return view('index', [
            'projects' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::where('id', $id)
            ->with('tasks', 'childProjects')
            ->first()
            ->toArray();

        $project['hierarchy_path'] = array_reverse($this->getHierarchyPathToProject($id));

        return view('components.project', [
            'project' => $project
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'projects_titles' => 'required|string',
            'parent_project_id' => 'nullable|int|exists:projects,id'
        ]);

        $projects = preg_split('/\n|\r\n?/', $request->get('projects_titles'));

        for ($i = 0; $i < count($projects); $i++) {
            $projectTitle = $projects[$i];
            $projects[$i] = [];
            $projects[$i]['title'] = $projectTitle;
            $projects[$i]['parent_project_id'] = $request->get('parent_project_id');
        }

        $projectId = null;

        foreach ($projects as $project) {
            $project = new Project([
                'title' => $project['title'],
                'parent_project_id' => $project['parent_project_id'],
            ]);

            $project->save();
            $projectId = $project->id;
        }

        $message = "Проекты добавлены!";

        if ($request->additionalAction){
            switch ($request->additionalAction){
                case 'open_last': {
                    return redirect()
                        ->route('projects.show', $projectId)
                        ->withSuccess($message);
                }
                default:
                    throw new Exception("Invalid additionalAction value");
                    break;
            }
        }

        return redirect()->back()->withSuccess($message);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'parent_project_id' => 'nullable'
        ]);

        $project = Project::find($id);
        $project->title = $request->get('title');
        $project->parent_project_id = $request->get('parent_project_id');
        $project->save();

        return redirect()->back()->withSuccess("Данные проекта '{$request->get('title')}' обновлены!");
    }

    public function destroy($id)
    {
        $project = Project::where('id', $id)->first()->toArray();

        if (($project['child_task_count'] + $project['child_project_count']) === 0) {
            Project::where('id', $id)->delete();
        }

        $message = "Проект '{$project['title']}' удален!";

        if (is_null($project['parent_project_id'])) {
            return redirect()
                ->route('projects.index')
                ->withSuccesses($message);
        } else {
            return redirect()
                ->route('projects.show', $project['parent_project_id'])
                ->withSuccess($message);
        }

    }

    private function getHierarchyPathToProject($projectId)
    {
        $i = 0;
        $hierarchy = [];
        do {
            $project = Project::where('id', $projectId)
                ->first(['id', 'title', 'parent_project_id']);

            $hierarchy[$i]['id'] = $project->id;
            $hierarchy[$i]['title'] = $project->title;
            $hierarchy[$i]['route'] = $project->route;

            $projectSiblings = Project::select(['id', 'title', 'parent_project_id'])
                ->where('parent_project_id', $project->parent_project_id)
                ->orderBy('id')
                ->get();

            $hierarchy[$i]['siblings'] = [];

            foreach ($projectSiblings as $sibling){
                $hierarchy[$i]['siblings'][$sibling->id]['id'] = $sibling->id;
                $hierarchy[$i]['siblings'][$sibling->id]['title'] = $sibling->title;
                $hierarchy[$i]['siblings'][$sibling->id]['route'] = $sibling->route;
            }

            $projectId = $project->parent_project_id;
            $i++;

        } while (!is_null($project->parent_project_id));

        return $hierarchy;
    }

}
