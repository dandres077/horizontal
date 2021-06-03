<?php

use Illuminate\Database\Seeder;
use App\Sexos;

class SexosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sexos::create(['nombre' => 'Mujer']);
		Sexos::create(['nombre' => 'Hombre']);
		Sexos::create(['nombre' => 'Otro']);
    }
}
