<?php

use Illuminate\Database\Seeder;
use App\Mascotas;

class MascotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mascotas::create([
        	'bien_id' => '1',
            'usuario_id' => '1',
            'tipo_id' => '30',
            'raza' => 'San bernardo',
            'nacimiento' => '2020-02-02',
            'nombre' => 'Duglas',
            'observacion' => 'Babea mucho'
        ]);

        Mascotas::create([
        	'bien_id' => '2',
            'usuario_id' => '5',
            'tipo_id' => '31',
            'raza' => 'Leopardo',
            'nacimiento' => '2020-02-01',
            'nombre' => 'Fico',
            'observacion' => 'No cae de pie'
        ]);  
    }
}


			