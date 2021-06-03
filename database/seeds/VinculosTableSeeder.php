<?php

use Illuminate\Database\Seeder;
use App\Vinculos;



class VinculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vinculos::create([
	        'nombre' => 'CAI San Fernando',
	        'telefono1' => '2406967',
	        'telefono2' => '3177742',
	        'direccion' => 'Calle 72 58-85',
	        'orden' => '1',
	        'imagen' => '',
	        'observacion' => 'Disponible las 24 horas',
	        'ubicacion' =>'1'
        ]);

        Vinculos::create([
	        'nombre' => 'Bomberos',
	        'telefono1' => '3216548',
	        'telefono2' => '9876543',
	        'direccion' => 'Calle 76 90-85',
	        'orden' => '2',
	        'imagen' => '',
	        'observacion' => 'Disponible las 24 horas',
	        'ubicacion' =>'1'
        ]);

        Vinculos::create([
	        'nombre' => 'Policia Metropolitana',
	        'telefono1' => '112',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '1',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/policia.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);

        Vinculos::create([
	        'nombre' => 'Bomberos',
	        'telefono1' => '119',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '2',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/bomberos.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);

        Vinculos::create([
	        'nombre' => 'Cruz roja',
	        'telefono1' => '132',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '3',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/cruz_roja.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);

        Vinculos::create([
	        'nombre' => 'Defensa civil',
	        'telefono1' => '144',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '4',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/defensa_civil.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);

        Vinculos::create([
	        'nombre' => 'Emergencias médicas',
	        'telefono1' => '125',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '5',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/medicas.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);

        Vinculos::create([
	        'nombre' => 'Polícia de tránsito',
	        'telefono1' => '127',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '6',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/transito.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);

        Vinculos::create([
	        'nombre' => 'Gas natural',
	        'telefono1' => '164',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '7',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/gas_natural.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);

        Vinculos::create([
	        'nombre' => 'Codensa',
	        'telefono1' => '115',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '8',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/codensa.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);

        Vinculos::create([
	        'nombre' => 'Empresa de acueducto y alcantarillado',
	        'telefono1' => '116',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '9',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/acueducto.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);

        Vinculos::create([
	        'nombre' => 'Centro toxicológico',
	        'telefono1' => '136',
	        'telefono2' => '',
	        'direccion' => '',
	        'orden' => '10',
	        'imagen' => 'http://157.253.198.43/conjuntos6/public/img/vinculos/toxicologia.png',
	        'observacion' => 'Emergencia',
	        'ubicacion' =>'2'
        ]);
    }
}


