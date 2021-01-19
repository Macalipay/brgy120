<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'position',
        'message',
        'picture',
    ];
}
