<?php

namespace App\Http\Controllers;

use App\Model\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
//        dd(
            $projects = Project::Parent()
                ->with(
                    'tasks',
                    'allChildProjects',
                    'allChildProjects.tasks'
                )
                ->orderBy('title')
                ->get()
                ->toArray();
//        );

        return view('index', [
            'projects' => $projects
        ]);
    }
}
