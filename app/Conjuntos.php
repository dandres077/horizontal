<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conjuntos extends Model
{
    protected $fillable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'celular',
        'email',
        'imagen',
        'pais_id',
        'dpto_id',
        'ciudad_id',
        'localidad',
        'barrio',
        'estratos_id',
        'descripcion',
        'n_torres',
        'n_aptos',
        'n_parqueaderov',
        'n_parqueaderom',
        'm_parqueaderob',
        'status',
        'user_create',
        'user_update'      
    ];

    public function comercios(){
        return $this->belongsToMany(Comercios::class, 'comercios_conjuntos','conjunto_id', 'comercio_id');
    }

    public function vinculos(){
        return $this->belongsToMany(Vinculos::class, 'vinculos_conjuntos','conjunto_id', 'vehiculo_id');
    }
}



			

