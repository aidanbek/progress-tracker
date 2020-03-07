<?php

namespace App\Observers;

use App\Model\Task;

class TaskObserver
{
    public function created(Task $task)
    {
        $task->parentProject()->touch();
    }

    public function updated(Task $task)
    {
        $task->parentProject()->touch();
    }

    public function deleted(Task $task)
    {
        $task->parentProject()->touch();
    }

    public function restored(Task $task)
    {
        $task->parentProject()->touch();
    }

    public function forceDeleted(Task $task)
    {
        $task->parentProject()->touch();
    }
}
