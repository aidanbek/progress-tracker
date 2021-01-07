<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';
    protected $primaryKey = 'task_id';
    protected $appends = array(
        'route'
    );
    protected $fillable = ['title', 'parent_project_id', 'completed'];
    protected $touches = ['parentProject'];

    public function parentProject()
    {
        return $this->belongsTo(Project::class, 'parent_project_id', 'project_id');
    }

    public function allParentProjects()
    {
        return $this->parentProject()->with('allParentProjects');
    }

    public function getRouteAttribute()
    {
        return '/task/'.$this['task_id'];
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    public function scopeCompleted($query)
    {
        return $query->where('completed', 1);
    }

    public function scopeUncompleted($query)
    {
        return $query->where('completed', 0);
    }
}
