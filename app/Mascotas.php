<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    protected $fillable = [
        'bien_id',
        'usuario_id',
        'tipo_id',
        'raza',
        'nacimiento',
        'nombre',
        'observacion',
        'status',
        'user_create',
        'user_update'      
    ];
}



			