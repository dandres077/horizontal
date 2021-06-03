<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntasFrecuentes extends Model
{
    protected $fillable = [
        'conjunto_id',
        'titulo',
        'texto',
        'status',
        'user_create',
        'user_update'       
    ];
}
