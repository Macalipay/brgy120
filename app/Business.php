<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'code',
        'youth_id',
        'issued_date',
        'business_name',
        'business_nature',
        'business_location',
        'status',
    ];

    public function youth()
    {
        return $this->belongsTo(Youth::class, 'youth_id');
    }
}
