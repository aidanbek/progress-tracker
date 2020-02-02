<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'project_id';
    protected $appends = array(
        'completion_percentage',
        'child_task_count',
        'child_project_count',
        'project_completion_percentage',
        'task_completion_percentage',
        'route'
    );
    protected $fillable = ['title'];
    public $timestamps = false;

    public function scopeParent($query)
    {
        return $query->whereNull('parent_project_id');
    }

    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_project_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'parent_project_id', 'project_id');
    }

    public function parentProject()
    {
        return $this->belongsTo(Project::class, 'parent_project_id', 'project_id');
    }

    public function allParentProjects()
    {
        return $this->parentProject()->with('allParentProjects');
    }

    public function childProjects()
    {
        return $this->hasMany(Project::class, 'parent_project_id', 'project_id');
    }

    public function allChildProjects()
    {
        return $this->childProjects()->with('allChildProjects', 'allChildProjects.tasks');
    }

    public function getChildTaskCountAttribute()
    {
        return count($this->tasks()->get()->toArray());
    }

    public function getChildProjectCountAttribute()
    {
        return count($this->childProjects()->get()->toArray());
    }

    public function completionTotalCount()
    {
        return $this->tasks()->get()->count() + $this->childProjects()->get()->count();
    }

    public function getTaskCompletionPercentageAttribute()
    {
        $tasks = $this->tasks()->get()->toArray();

        if (count($tasks) === 0) return 0;

        $completedTaskCount = 0;

        foreach ($tasks as $task) {
            $completedTaskCount += $task['completed'];
        }

        return round($completedTaskCount / $this->completionTotalCount() * 100);
    }

    public function getProjectCompletionPercentageAttribute()
    {
        $projects = $this->childProjects()->get()->toArray();

        $projectsCount = count($projects);

        if (count($projects) === 0) return 0;

        $completedProjectPercentage = 0;

        foreach ($projects as $project) {
            $completedProjectPercentage += round($project['completion_percentage'] / $this->completionTotalCount());
        }

        return $completedProjectPercentage;
    }

    public function getCompletionPercentageAttribute()
    {
        return $this->getProjectCompletionPercentageAttribute() + $this->getTaskCompletionPercentageAttribute();
    }

    public function getRouteAttribute()
    {
        return route('projects.show', $this['project_id']);
    }
}
