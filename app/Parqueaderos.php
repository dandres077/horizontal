<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parqueaderos extends Model
{
    protected $fillable = [
        'conjunto_id',
        'tipo_id',
        'nombre',
        'observacion',
        'status',
        'user_create',
        'user_update'      
    ];
}


			