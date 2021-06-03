<?php

use Illuminate\Database\Seeder;
use App\Tipos;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipos::create([
        	'nombre' => 'Tipo de documento',
            'siglas' => 'TD'
        ]);

        Tipos::create([
        	'nombre' => 'Tipo de identificación',
            'siglas' => 'TI'
        ]);

        Tipos::create([
        	'nombre' => 'Medio de pago',
            'siglas' => 'MP'
        ]);

        Tipos::create([
        	'nombre' => 'Tipo de vehículo',
            'siglas' => 'TV'
        ]);

        Tipos::create([
        	'nombre' => 'Color vehículo',
            'siglas' => 'CO'
        ]);

        Tipos::create([
        	'nombre' => 'Tipo residente',
            'siglas' => 'TR'
        ]);

        Tipos::create([
        	'nombre' => 'Tipo mascota',
            'siglas' => 'TM'
        ]);

        Tipos::create([
            'nombre' => 'Estratos',
            'siglas' => 'ES'
        ]);
    }
}
