<?php

use Illuminate\Database\Seeder;
use App\Conjuntos;

class ConjuntosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conjuntos::create([
        	'nombre' => 'Conjunto residencial Victoria I',
			'nit' => '321654987',
			'direccion' => 'Diagonal 28 31-60',
			'telefono' => '321654987',
			'celular' => '3158796352',
			'email' => 'conjuntovictoria1@gmail.com',
			'imagen' => 'http://157.253.198.43/conjuntos6/public/img/conjuntos/RAQqEW2RehtVsBA5MdbjcSzN4HPovpgG5QXVQCG4.jpeg',
			'pais_id' => '5',
			'dpto_id' => '6',
			'ciudad_id' => '6',
			'localidad' => 'Barrios Unidos',
			'barrio' => 'Ciudad Verde',
			'estratos_id' => '3',
			'descripcion' => 'El Conjunto Quinta Paredes se encuentra construido en una parcela de forma rectangular, en esquina, de 5.303,59 m2, en la Calle Ciega de la Urbanización San Marino, Chacao. Tiene una excelente ubicación, pues está en una calle muy tranquila con control de acceso y rodeada de una serie de desarrollos de gran calidad. Adicionalmente en este terreno existen unos grandes samanes, árboles de gran belleza, que no solo se han a conservado, sino que forman parte integral del desarrollo.',
			'n_torres' => '4',
			'n_aptos' => '72',
			'n_parqueaderov' => '35',
			'n_parqueaderom' => '20',
			'm_parqueaderob' => '20'
        ]);
    }
}

