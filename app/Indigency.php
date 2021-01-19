<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indigency extends Model
{
    protected $fillable = [
        'code',
        'youth_id',
        'issued_date',
        'purpose',
    ];

    public function youth()
    {
        return $this->belongsTo(Youth::class, 'youth_id');
    }
}
