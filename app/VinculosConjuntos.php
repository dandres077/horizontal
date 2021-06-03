<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VinculosConjuntos extends Model
{
    protected $fillable = [
  		'conjunto_id',
        'vinculo_id',
        'status',
        'user_create',
        'user_update' 
    ];
}



			