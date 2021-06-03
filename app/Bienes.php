<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bienes extends Model
{
    protected $fillable = [
        'conjunto_id',
        'torre_id',
        'nombre',
        'metrosbienes_id',
        'observacion',
        'status',
        'user_create',
        'user_update'       
    ];
}



			