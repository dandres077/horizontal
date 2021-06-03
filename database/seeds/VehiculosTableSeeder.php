<?php

use Illuminate\Database\Seeder;
use App\Vehiculos;

class VehiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehiculos::create([
        	'tipo_id' => '12',
	        'modelo' => '2020',
	        'marca_id' => '117',
	        'color_id' => '16',
	        'observacion' => 'Sin golpes',
        ]);

        Vehiculos::create([
        	'tipo_id' => '12',
	        'modelo' => '2018',
	        'marca_id' => '120',
	        'color_id' => '16',
	        'observacion' => 'Único dueño',
        ]);

        Vehiculos::create([
        	'tipo_id' => '12',
	        'modelo' => '2016',
	        'marca_id' => '110',
	        'color_id' => '16',
	        'observacion' => 'Todo bien',
        ]);
    }
}
