<?php

use Illuminate\Database\Seeder;
use App\Comercios;

class ComerciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comercios::create([
        	'nombre' => 'Perros calientes El Dave',
	        'descripcion' => 'La mejor comida rapida de Quinta paredes',
	        'telefono1' => '0312406967',
	        'telefono2' => '3186932083',
	        'ubicacion' => 'C.C. Quinta paredes',
	        'horario' => 'Lunes a Domingo, 1pm - 10 pm',
	        'fecha_inicio' => '2020-03-01',
	        'fecha_fin' => '2020-03-30',
	        'tags' => 'comida', 
	        'imagen' =>'http://157.253.198.43/conjuntos6/public/img/comercios/perritos.png'
        ]);

        Comercios::create([
        	'nombre' => 'Hamburguesas Country',
	        'descripcion' => 'Las mejores hamburguesas de Quinta paredes',
	        'telefono1' => '0317175480',
	        'telefono2' => '3115609578',
	        'ubicacion' => 'C.C. Quinta paredes',
	        'horario' => 'Lunes a Domingo, 2pm - 9 pm',
	        'fecha_inicio' => '2020-03-01',
	        'fecha_fin' => '2020-03-30',
	        'tags' => 'comida', 
	        'imagen' =>'http://157.253.198.43/conjuntos6/public/img/comercios/hamburguesas.png'
        ]);

        Comercios::create([
        	'nombre' => 'Lavandería 2D',
	        'descripcion' => 'Lavado con jabon y aguita',
	        'telefono1' => '0312406967',
	        'telefono2' => '3186932083',
	        'ubicacion' => 'C.C. Quinta paredes',
	        'horario' => 'Lunes a Domingo, 8am - 8pm',
	        'fecha_inicio' => '2020-03-01',
	        'fecha_fin' => '2020-03-30',
	        'tags' => 'servicio', 
	        'imagen' =>'http://157.253.198.43/conjuntos6/public/img/comercios/lavanderia.png' 
        ]);
    }
}
