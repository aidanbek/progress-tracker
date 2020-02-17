<?php

namespace App\Http\Controllers;

use App\Model\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::Parent()
            ->with('tasks')
            ->orderBy('project_id')
            ->get()
            ->toArray();

        return view('index', [
            'projects' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::where('project_id', $id)
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
            'title' => 'required',
            'parent_project_id' => 'nullable'
        ]);

        $project = new Project([
            'title' => $request->get('title'),
            'parent_project_id' => $request->get('parent_project_id'),
        ]);

        $project->save();

        return redirect()->back()->withSuccess("Проект '{$request->get('title')}' добавлен!");
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
        $project = Project::where('project_id', $id)->first()->toArray();

        if (($project['child_task_count'] + $project['child_project_count']) === 0) {
            Project::where('project_id', $id)->delete();
        }
        if (is_null($project['parent_project_id'])) {
            return redirect()
                ->route('projects.index')
                ->withSuccesses("Проект '{$project['title']}' удален!");
        } else {
            return redirect()
                ->route('projects.show', $project['parent_project_id'])
                ->withSuccess("Проект '{$project['title']}' удален!");
        }

    }

    private function getHierarchyPathToProject($projectId)
    {
        $i = 0;
        $hierarchy = [];
        do {

            $project = Project::where('project_id', $projectId)
                ->first(['project_id', 'title', 'parent_project_id']);

            $hierarchy[$i]['project_id'] = $project->project_id;
            $hierarchy[$i]['title'] = $project->title;
            $hierarchy[$i]['route'] = $project->route;

            $projectId = $project->parent_project_id;
            $i++;

        } while (!is_null($project->parent_project_id));

        return $hierarchy;
    }

}
