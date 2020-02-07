<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'id_card',
        'occupation',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
