<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Task;

class TaskController extends Controller
{

    public function task($id)
    {
        $task = Task::where('task_id', $id)
            ->first()
            ->toArray();

        return view('components.task', ['task' => $task]);
    }
}
