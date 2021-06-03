<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MarcasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TiposTableSeeder::class);
        $this->call(OpcionesTableSeeder::class);
        $this->call(PaisesTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(CiudadesTableSeeder::class);
        $this->call(ConjuntosTableSeeder::class);
        $this->call(TorresTableSeeder::class);
        $this->call(MetrosBienesTableSeeder::class);        
        $this->call(BienesTableSeeder::class);
        $this->call(ParqueaderosTableSeeder::class);
        $this->call(SexosTableSeeder::class);
        $this->call(UsuariosBienesSeeder::class);
        $this->call(VehiculosTableSeeder::class); 
        $this->call(MascotasTableSeeder::class);
        $this->call(ComerciosTableSeeder::class); 
        $this->call(ComerciosConjuntosTableSeeder::class); 
        $this->call(ComunicadosTableSeeder::class);  
        $this->call(VinculosTableSeeder::class);
        $this->call(VinculosConjuntosTableSeeder::class);              
    }
}
