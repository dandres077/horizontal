<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comercios extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'telefono1',
        'telefono2',
        'ubicacion',
        'horario',
        'fecha_inicio',
        'fecha_fin',
        'tags',
        'imagen',
        'status',
        'user_create',
        'user_update'      
    ];

    public function conjuntos(){
        return $this->belongsToMany(Conjuntos::class, 'comercios_conjuntos','comercio_id', 'conjunto_id');
    }
}


			