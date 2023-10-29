<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {
        $task = Task::where('id', $id)
            ->first()
            ->toArray();

        return view('components.task', ['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'completed' => 'nullable'
        ]);

        $task = Task::find($id);

        $task->title = $request->get('title');
        $task->completed = is_null($request->get('completed')) ? 0 : 1;

        $task->save();

        $taskTitle = Task::where('id', $id)->first()->toArray()['title'];
        return redirect()->back()->withSuccess("Задача '{$taskTitle}' обновлена!");
    }

    public function store(Request $request)
    {
        $request->validate([
            'tasks_titles' => 'required',
            'parent_project_id' => 'required|int|exists:projects,id',
            'completed' => 'nullable|string'
        ]);

        $tasks = preg_split('/\n|\r\n?/', $request->get('tasks_titles'));

        for ($i = 0; $i < count($tasks); $i++) {
            $taskTitle = $tasks[$i];
            $tasks[$i] = [];
            $tasks[$i]['title'] = $taskTitle;
            $tasks[$i]['parent_project_id'] = $request->get('parent_project_id');
            $tasks[$i]['completed'] = is_null($request->get('completed')) ? 0 : 1;
        }

        foreach ($tasks as $task) {
            $task = new Task([
                'title' => $task['title'],
                'parent_project_id' => $task['parent_project_id'],
                'completed' => $task['completed']
            ]);

            $task->save();
        }

        return redirect()->back()->withSuccess("Задачи добавлены!");
    }

    public function destroy($id)
    {
        $taskTitle = Task::where('id', $id)->first()->toArray()['title'];
        Task::find($id)->delete();
        return redirect()->back()->withSuccess("Задача '{$taskTitle}' удалена!");
    }
}
