<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosBienes extends Model
{
    protected $fillable = [
        'bien_id',
        'usuario_id',
        'tipo_residente',
        'status',
        'user_create',
        'user_update'     
    ];
}
