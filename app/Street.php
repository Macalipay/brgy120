<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $fillable = [
        'street',
    ];

    public function resident()
    {
        return $this->hasOne(Youth::class);
    }
}
