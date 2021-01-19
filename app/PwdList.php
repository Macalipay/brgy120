<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PwdList extends Model
{
    protected $fillable = [
        'youth_id',
        'pwd_id',
    ];

    public function youth()
    {
        return $this->belongsTo(Youth::class, 'youth_id');
    }

    public function pwd()
    {
        return $this->belongsTo(Pwd::class, 'pwd_id');
    }
}
