<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opciones extends Model
{
    protected $fillable = [
        'tipos_id',
        'nombre',
        'status',
        'user_create',
        'user_update'       
    ];
}
