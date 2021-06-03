<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValoresConjuntos extends Model
{
    protected $fillable = [
        'conjunto_id',
        'periodo_id',
        'item_id',
        'opcion_id',
        'valor',
        'descripcion',
        'status',
        'user_create',
        'user_update',
    ];
}

		
			