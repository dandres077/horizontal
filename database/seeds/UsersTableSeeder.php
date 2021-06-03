<?php

use Illuminate\Database\Seeder;
use App\User;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'David',
            'last' => 'Contreras',
            'email' => 'davidcontreras07@gmail.com',      
            'imagen' => 'http://157.253.198.43/conjuntos6/public/img/users/user_default.png',     
            'password' => bcrypt('iandavid2110')
        ]);

        User::create([
            'name' => 'David',
            'last' => 'Gómez',
            'email' => 'davgomez@gmail.com',   
            'imagen' => 'http://157.253.198.43/conjuntos6/public/img/users/user_default.png',         
            'password' => bcrypt('dave2020')
        ]);

        User::create([
            'name' => 'Carolina',
            'last' => 'Trompa',
            'email' => 'caro2819@hotmail.com',  
            'imagen' => 'http://157.253.198.43/conjuntos6/public/img/users/user_default.png',           
            'password' => bcrypt('caro2819')
        ]);

        User::create([
            'name' => 'Ian',
            'last' => 'Contreras',
            'email' => 'ian@gmail.com',  
            'imagen' => 'http://157.253.198.43/conjuntos6/public/img/users/user_default.png',           
            'password' => bcrypt('ian')
        ]);

        User::create([
            'name' => 'Carolina',
            'last' => 'Gómez',
            'email' => 'caro@hotmail.com', 
            'imagen' => 'http://157.253.198.43/conjuntos6/public/img/users/user_default.png',            
            'password' => bcrypt('caro')
        ]);

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'special' => 'all-access',
        ]);

        Role::create([
            'name' => 'Individual',
            'slug' => 'individual',            
        ]);

        Role::create([
            'name' => 'Empresarial',
            'slug' => 'empresarial',
        ]);
    }
}
