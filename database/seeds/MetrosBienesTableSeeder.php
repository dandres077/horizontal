<?php

use Illuminate\Database\Seeder;
use App\MetrosBienes;

class MetrosBienesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetrosBienes::create([
        	'conjunto_id' => '1',
        	'nombre' => 'Inmueble tipo 1',
        	'metros' => '55 mts',
        	'observacion' => 'Primer piso'
        ]);

        MetrosBienes::create([
        	'conjunto_id' => '1',
        	'nombre' => 'Inmueble tipo 2',
        	'metros' => '60 mts',
        	'observacion' => 'Segundo a sexto piso'
        ]);        
    }
}