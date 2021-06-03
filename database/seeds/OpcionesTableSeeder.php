<?php

use Illuminate\Database\Seeder;
use App\Opciones;

class OpcionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       

        Opciones::create(['tipos_id' => '2','nombre' => 'Cédula de Ciudadania']);
        Opciones::create(['tipos_id' => '2','nombre' => 'Nit']);
        Opciones::create(['tipos_id' => '2','nombre' => 'Rut']);
        Opciones::create(['tipos_id' => '2','nombre' => 'Cédula de Extranjería']);
        Opciones::create(['tipos_id' => '2','nombre' => 'Tarjeta de identidad']);
        Opciones::create(['tipos_id' => '2','nombre' => 'Registro Civil']);

        Opciones::create(['tipos_id' => '3','nombre' => 'Efectivo']);
        Opciones::create(['tipos_id' => '3','nombre' => 'Tarjeta Débito']);
        Opciones::create(['tipos_id' => '3','nombre' => 'Tarjeta Crédito']);
        Opciones::create(['tipos_id' => '3','nombre' => 'Transferencia']);
        Opciones::create(['tipos_id' => '3','nombre' => 'Cheque']);      

        Opciones::create(['tipos_id' => '4','nombre' => 'Carro']);
        Opciones::create(['tipos_id' => '4','nombre' => 'Motocicleta']);
        Opciones::create(['tipos_id' => '4','nombre' => 'Bicicleta']);

        Opciones::create(['tipos_id' => '5','nombre' => 'Blanco']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Negro']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Gris']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Plata']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Rojo']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Azul']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Cafe']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Beige']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Amarillo']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Verde']);
        Opciones::create(['tipos_id' => '5','nombre' => 'Naranja']);

        Opciones::create(['tipos_id' => '6','nombre' => 'Propietario']);
        Opciones::create(['tipos_id' => '6','nombre' => 'Familia Propietario']);
        Opciones::create(['tipos_id' => '6','nombre' => 'Arrendatario']);
        Opciones::create(['tipos_id' => '6','nombre' => 'Familia Arrendatario']);

        Opciones::create(['tipos_id' => '7','nombre' => 'Perro']);
        Opciones::create(['tipos_id' => '7','nombre' => 'Gato']);

        Opciones::create(['tipos_id' => '8','nombre' => '1']);
        Opciones::create(['tipos_id' => '8','nombre' => '2']);
        Opciones::create(['tipos_id' => '8','nombre' => '3']);
        Opciones::create(['tipos_id' => '8','nombre' => '4']);
        Opciones::create(['tipos_id' => '8','nombre' => '5']);
        Opciones::create(['tipos_id' => '8','nombre' => '6']);

    }
}