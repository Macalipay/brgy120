<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cicl extends Model
{
    protected $fillable = [
        'youth_id',
        'case_id',
        'date_happen',
        'date_filed',
        'complainant',
        'remarks',
    ];

    public function youth()
    {
        return $this->belongsTo(Youth::class);
    }

    public function case_type()
    {
        return $this->belongsTo(CaseType::class, 'case_id');
    }
}
