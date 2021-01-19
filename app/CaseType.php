<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    protected $fillable = [
        'case',
        'description'
    ];

    public function cicl()
    {
        return $this->hasMany(Cicl::class);
    }
}
