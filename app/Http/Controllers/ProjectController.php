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
            ->with('tasks', 'childProjects','allChildProjects', 'allChildProjects.tasks')
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
            ->with('tasks', 'childProjects', 'allParentProjects')
            ->first()
            ->toArray();

        return view('components.project', [
            'project' => $project
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'parent_project_id' => 'nullable'
        ]);

        $project = new Project([
            'title' => $request->get('title'),
            'parent_project_id' => $request->get('parent_project_id'),
        ]);

        $project->save();

        return redirect()->back()->withSuccesses('Новый проект добавлен!');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $project = Project::where('project_id', $id)->first()->toArray();

        if(($project['child_task_count'] + $project['child_project_count']) === 0){
            Project::where('project_id', $id)->delete();
        }
        if (is_null($project['parent_project_id'])) {
            return redirect()->route('projects.index')->withSuccesses('Проект удален!');
        } else {
            return redirect()->route('projects.show', $project['parent_project_id'])->withSuccesses('Проект удален!');
        }

    }

}
