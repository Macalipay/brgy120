<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'project_id',
        'participants',
        'picture',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
