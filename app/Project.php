<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date_implemented',
        'location',
        'requirements',
        'registration',
        'date_time',
        'attendees',
        'lead_by',
        'picture',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(Participant::class, 'project_id');
    }
}
