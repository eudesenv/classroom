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
        'classe_id',
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function classe()
    {
        return $this->hasOne('App\Classe');
    }
}
