<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'project_id';
    protected $appends = array(
        'child_project_count',
        'child_task_count',
        'child_task_completed_count',
        'child_task_completion_percentage',
        'route'
    );
    protected $fillable = ['title', 'parent_project_id'];
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
        return $this
            ->hasMany(Task::class, 'parent_project_id', 'project_id')
            ->orderBy('task_id');
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
        return $this
            ->hasMany(Project::class, 'parent_project_id', 'project_id')
            ->orderBy('project_id');
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
        return $this->tasks()->get()->count();
    }

    public function getChildTaskCompletedCountAttribute()
    {
        $tasks = $this->tasks()->get()->toArray();

        if (count($tasks) === 0) return 0;

        $completedTaskCount = 0;

        foreach ($tasks as $task) {
            $completedTaskCount += $task['completed'];
        }

        return $completedTaskCount;
    }

    public function getChildTaskCompletionPercentageAttribute()
    {
        $tasks = $this->tasks()->get()->toArray();

        if (count($tasks) === 0) return 0;

        $completedTaskCount = 0;

        foreach ($tasks as $task) {
            $completedTaskCount += $task['completed'];
        }

        return round($completedTaskCount / $this->completionTotalCount() * 100);
    }

    public function getRouteAttribute()
    {
        return route('projects.show', $this['project_id']);
    }
}
