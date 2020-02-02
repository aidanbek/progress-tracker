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

    public function project($id)
    {
        $project = Project::where('project_id', $id)
            ->with('tasks', 'childProjects', 'allParentProjects')
            ->first()
            ->toArray();

        return view('components.project', [
            'project' => $project
        ]);
    }
}
