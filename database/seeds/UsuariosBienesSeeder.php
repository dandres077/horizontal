<?php

use Illuminate\Database\Seeder;
use App\UsuariosBienes;

class UsuariosBienesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsuariosBienes::create([
        	'bien_id' => '1',
        	'usuario_id' => '1',
        	'tipo_residente' => '26',
        ]);

        UsuariosBienes::create([
        	'bien_id' => '1',
        	'usuario_id' => '3',
        	'tipo_residente' => '26',
        ]);

        UsuariosBienes::create([
        	'bien_id' => '1',
        	'usuario_id' => '4',
        	'tipo_residente' => '27',
        ]);

        UsuariosBienes::create([
        	'bien_id' => '2',
        	'usuario_id' => '2',
        	'tipo_residente' => '26',
        ]);

        UsuariosBienes::create([
        	'bien_id' => '2',
        	'usuario_id' => '5',
        	'tipo_residente' => '26',
        ]);
    }
}
