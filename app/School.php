<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'description',
        'phone',
        'address',
        'zipcode',
        'city',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
