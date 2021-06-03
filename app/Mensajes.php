<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    protected $fillable = [
        'conjunto_id',
        'remitente_id',
        'destinatario_id',
        'categoria',
        'lineal_id',
        'importante',
        'status',
        'asunto',
        'mensaje',
        'user_create',
        'user_update',      
    ];
}