<?php

use Illuminate\Database\Seeder;
use App\Ciudades;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudades::create(['paises_id' => '5','departamentos_id' => '1','nombre' => 'Leticia']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '2','nombre' => 'Medellín']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '3','nombre' => 'Arauca']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '4','nombre' => 'Barranquilla']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '5','nombre' => 'Cartagena de Indias']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '6','nombre' => 'Tunja']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '7','nombre' => 'Manizales']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '8','nombre' => 'Florencia']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '9','nombre' => 'Yopal']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '10','nombre' => 'Popayán']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '11','nombre' => 'Valledupar']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '12','nombre' => 'Quibdó']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '13','nombre' => 'Montería']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '14','nombre' => 'Bogotá']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '15','nombre' => 'Inírida']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '16','nombre' => 'San José del Guaviare']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '17','nombre' => 'Neiva']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '18','nombre' => 'Riohacha']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '19','nombre' => 'Santa Marta']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '20','nombre' => 'Villavicencio']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '21','nombre' => 'Pasto']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '22','nombre' => 'San José de Cúcuta']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '23','nombre' => 'Mocoa']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '24','nombre' => 'Armenia']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '25','nombre' => 'Pereira']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '26','nombre' => 'San Andrés']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '27','nombre' => 'Bucaramanga']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '28','nombre' => 'Sincelejo']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '29','nombre' => 'Ibagué']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '30','nombre' => 'Cali']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '31','nombre' => 'Mitú']);
		Ciudades::create(['paises_id' => '5','departamentos_id' => '32','nombre' => 'Puerto Carreño']);

    }
}
