<?php

namespace App\Observers;

use App\Model\Project;

class ProjectObserver
{
    public function created(Project $project)
    {
        if ($project->parentProject()) $project->parentProject()->touch();
    }

    public function updated(Project $project)
    {
        if ($project->parentProject()) $project->parentProject()->touch();
    }

    public function deleted(Project $project)
    {
        if ($project->parentProject()) $project->parentProject()->touch();
    }

    public function restored(Project $project)
    {
        if ($project->parentProject()) $project->parentProject()->touch();
    }

    public function forceDeleted(Project $project)
    {
        if ($project->parentProject()) $project->parentProject()->touch();
    }
}
