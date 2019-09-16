<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'description',
        'availiable',
        'school_id'
    ];
    
    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
