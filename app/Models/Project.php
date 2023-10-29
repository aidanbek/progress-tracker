<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $appends = array(
        'child_project_count',
        'child_task_count',
        'child_task_completed_count',
        'child_task_completion_percentage',
        'route'
    );
    protected $fillable = ['title', 'parent_project_id'];
    protected $touches = ['parentProject'];

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
            ->hasMany(Task::class, 'parent_project_id', 'id')
            ->orderBy('id');
    }

    public function parentProject()
    {
        return $this->belongsTo(Project::class, 'parent_project_id', 'id');
    }

    public function allParentProjects()
    {
        return $this->parentProject()->with('allParentProjects');
    }

    public function childProjects()
    {
        return $this
            ->hasMany(Project::class, 'parent_project_id', 'id')
            ->orderBy('id');
    }

    public function allChildProjects()
    {
        return $this->childProjects()->with('allChildProjects', 'allChildProjects.tasks');
    }

    public function getChildTaskCountAttribute()
    {
        return $this->tasks()->get()->count();
    }

    public function getChildProjectCountAttribute()
    {
        return $this->childProjects()->get()->count();
    }

    public function getChildTaskCompletedCountAttribute()
    {
        return $this->tasks()->completed()->get()->count();
    }

    public function getChildTaskCompletionPercentageAttribute()
    {
        $allTaskCount = $this->tasks()->get()->count();

        if ($allTaskCount === 0) {
            return 0;
        }

        $completedTaskCount = $this->tasks()->completed()->get()->count();

        return round($completedTaskCount / $allTaskCount * 100);
    }

    public function getRouteAttribute()
    {
        return route('projects.show', $this['id']);
    }
}
