<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youth extends Model
{
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'height',
        'weight',
        'gender',
        'lgbtqi',
        'lgbtqi_value',
        'birthday',
        'birthday_place',
        'marital_status',
        'religion',
        'spouse',
        'precinct_no',
        'tin',
        'philhealth',
        'pagibig',
        'sss',
        'residing_date',
        'street_id',
        'house_number',
        'contact',
        'contact_person',
        'contact_relation',
        'contact_number',
        'educational_attainment',
        'course',
        'skills',
        'occupation',
        'income',
        'solo_parent',
        'email',
        'student',
        'number_of_children',
        'mother_name',
        'father_name',
    ];

    public function cicl()
    {
        return $this->hasOne(Cicl::class);
    }

    public function street()
    {
        return $this->belongsTo(Street::class, 'street_id');
    }

    public function certification()
    {
        return $this->hasOne(Certificate::class);
    }

    public function indigency()
    {
        return $this->hasOne(Indigency::class);
    }
}
