<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherInformation extends Model
{
    protected $fillable = [
        'youth_id',
        'picture',
        'signature',
        'right_thumb',
        'left_thumb',
    ];

    public function youth()
    {
        return $this->belongsTo(youth::class, 'youth_id');
    }
}
