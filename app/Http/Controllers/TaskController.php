<?php

namespace App\Http\Controllers;

use App\Model\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {
        $task = Task::where('task_id', $id)
            ->first()
            ->toArray();

        return view('components.task', ['task' => $task]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'parent_project_id' => 'nullable|required'
        ]);

        $project = new Task([
            'title' => $request->get('title'),
            'parent_project_id' => $request->get('parent_project_id'),
        ]);

        $project->save();

        return redirect()->back()->withSuccesses('Новый проект добавлен!');
    }
}
