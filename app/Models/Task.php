<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $appends = array(
        'route'
    );
    protected $fillable = ['title', 'parent_project_id', 'completed'];
    protected $touches = ['parentProject'];

    public function parentProject()
    {
        return $this->belongsTo(Project::class, 'parent_project_id', 'id');
    }

    public function allParentProjects()
    {
        return $this->parentProject()->with('allParentProjects');
    }

    public function getRouteAttribute()
    {
        return '/task/'.$this['id'];
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
