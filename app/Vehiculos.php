<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    protected $fillable = [
        'tipo_id',
        'modelo',
        'marca_id',
        'color_id',
        'observacion',
        'status',
        'user_create',
        'user_update'    
    ];
}



			