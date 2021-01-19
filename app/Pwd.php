<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pwd extends Model
{
    protected $fillable = [
        'pwd',
        'description'
    ];

    public function pwd_list()
    {
        return $this->hasOne(PwdList::class);
    }
}
