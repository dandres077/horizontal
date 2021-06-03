<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetrosBienes extends Model
{
    protected $fillable = [
        'conjunto_id',
        'nombre',
        'metros',
        'observacion',
        'status',
        'user_create',
        'user_update'     
    ];
}



			