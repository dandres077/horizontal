<?php

use Illuminate\Database\Seeder;
use App\ComerciosConjuntos;

class ComerciosConjuntosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ComerciosConjuntos::create([
        	'conjunto_id' => '1',
        	'comercio_id' => '1'
        ]);

        ComerciosConjuntos::create([
        	'conjunto_id' => '1',
        	'comercio_id' => '2'
        ]);

        ComerciosConjuntos::create([
        	'conjunto_id' => '1',
        	'comercio_id' => '3'
        ]);
    }
}
