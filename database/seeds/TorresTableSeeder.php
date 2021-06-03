<?php

use Illuminate\Database\Seeder;
use App\Torres;


class TorresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Torres::create([
        	'conjunto_id' => '1',
        	'nombre' => 'Torre 1',
        	'observacion' => 'Ninguna',
        ]);

        Torres::create([
        	'conjunto_id' => '1',
        	'nombre' => 'Torre 2',
        	'observacion' => 'Ninguna',
        ]);

        Torres::create([
        	'conjunto_id' => '1',
        	'nombre' => 'Torre 3',
        	'observacion' => 'Ninguna',
        ]);
    }
}
