<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'description',
        'classe_id',
        'subject_id',
    ];
}
