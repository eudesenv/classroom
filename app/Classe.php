<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'school_id',
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
