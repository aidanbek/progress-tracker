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

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'completed' => 'nullable'
        ]);

        $task = Task::find($id);

        $task->title = $request->get('title');
        $task->completed = is_null($request->get('completed'))? 0: 1;
        $task->save();

        return redirect()->back()->withSuccesses('Задача обновлена!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'parent_project_id' => 'required'
        ]);

        $project = new Task([
            'title' => $request->get('title'),
            'parent_project_id' => $request->get('parent_project_id'),
        ]);

        $project->save();

        return redirect()->back()->withSuccesses('Новая задача добавлен!');
    }
}
