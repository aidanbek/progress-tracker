<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'project_id';

    public function scopeParent($query)
    {
        return $query->whereNull('parent_project_id');
    }

    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_project_id');
    }

    public function parentProject()
    {
        return $this->belongsTo(Project::class, 'parent_project_id', 'project_id');
    }

    public function childProjects()
    {
        return $this->hasMany(Project::class, 'parent_project_id', 'project_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'parent_project_id', 'project_id');
    }

    public function allChildProjects()
    {
        return $this->childProjects()->with('allChildProjects', 'allChildProjects.tasks');
    }

    public function allParentProjects()
    {
        return $this->parentProject()->with('allParentProjects');
    }
}
