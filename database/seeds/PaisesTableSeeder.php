<?php

use Illuminate\Database\Seeder;
use App\Paises;


class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	Paises::create(['nombre' => 'Argentina','siglas' => 'AR']);
		Paises::create(['nombre' => 'Bolivia','siglas' => 'BO']);
		Paises::create(['nombre' => 'Brasil','siglas' => 'BR']);
		Paises::create(['nombre' => 'Chile','siglas' => 'CH']);
		Paises::create(['nombre' => 'Colombia','siglas' => 'CO']);
		Paises::create(['nombre' => 'Costa Rica','siglas' => 'CO']);
		Paises::create(['nombre' => 'Cuba','siglas' => 'CU']);
		Paises::create(['nombre' => 'Ecuador','siglas' => 'EC']);
		Paises::create(['nombre' => 'El Salvador','siglas' => 'EL']);
		Paises::create(['nombre' => 'Guayana Francesa','siglas' => 'GU']);
		Paises::create(['nombre' => 'Granada','siglas' => 'GR']);
		Paises::create(['nombre' => 'Guatemala','siglas' => 'GU']);
		Paises::create(['nombre' => 'Guayana','siglas' => 'GU']);
		Paises::create(['nombre' => 'Haití','siglas' => 'HA']);
		Paises::create(['nombre' => 'Honduras','siglas' => 'HO']);
		Paises::create(['nombre' => 'Jamaica','siglas' => 'JA']);
		Paises::create(['nombre' => 'México','siglas' => 'ME']);
		Paises::create(['nombre' => 'Nicaragua','siglas' => 'NI']);
		Paises::create(['nombre' => 'Paraguay','siglas' => 'PA']);
		Paises::create(['nombre' => 'Panamá','siglas' => 'PA']);
		Paises::create(['nombre' => 'Perú','siglas' => 'PE']);
		Paises::create(['nombre' => 'Puerto Rico','siglas' => 'PU']);
		Paises::create(['nombre' => 'República Dominicana','siglas' => 'RE']);
		Paises::create(['nombre' => 'Surinam','siglas' => 'SU']);
		Paises::create(['nombre' => 'Uruguay','siglas' => 'UR']);
		Paises::create(['nombre' => 'Venezuela','siglas' => 'VE']);

    }
}
