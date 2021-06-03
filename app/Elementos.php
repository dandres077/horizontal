<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elementos extends Model
{
    protected $fillable = [
        'conjunto_id',
        'nombre',
        'descripcion',
        'imagen',
        'status',
        'user_create',
        'user_update'       
    ];
}
