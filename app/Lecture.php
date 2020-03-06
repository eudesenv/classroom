<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'description',
        'room_id',
        'classe_id',
        'subject_id',
    ];
}
