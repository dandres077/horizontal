<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicados extends Model
{
    protected $fillable = [
        'conjunto_id',
        'titulo',
        'texto',
        'imagen1',
        'imagen2',
        'imagen3',
        'documento1',
        'documento2',
        'documento3',
        'status',
        'user_create',
        'user_update'     
    ];
}



			
            
