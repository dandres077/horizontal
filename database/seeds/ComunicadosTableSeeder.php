<?php

use Illuminate\Database\Seeder;
use App\Comunicados;

class ComunicadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comunicados::create([
        	'conjunto_id' => '1',
			'titulo' => 'CONVOCATORIA ASAMBLEA ORDINARIA EN PROPIEDAD HORIZONTAL',
			'texto' => 'aca va el texto',
			'imagen1' => 'http://157.253.198.43/conjuntos6/public/img/comunicados/ZzXFFZwJ6wLFzJaf9OkotRS8OuQHSmht6jTIpjvR.jpeg',
			'documento1' => 'http://157.253.198.43/conjuntos6/public/documentos/conjuntos/CemxOLq8BZ9VxXSHvpUAtz38vka4SHB9vuQ9Gv2c.pdf'			
        ]);


        Comunicados::create([
            'conjunto_id' => '1',
            'titulo' => 'CONVOCATORIA COMITE DE CONVIVENCIA',
            'texto' => 'aca va el texto',
            'imagen1' => 'http://157.253.198.43/conjuntos6/public/img/comunicados/ZzXFFZwJ6wLFzJaf9OkotRS8OuQHSmht6jTIpjvR.jpeg',
            'documento1' => 'http://157.253.198.43/conjuntos6/public/documentos/conjuntos/CemxOLq8BZ9VxXSHvpUAtz38vka4SHB9vuQ9Gv2c.pdf'         
        ]);


        Comunicados::create([
            'conjunto_id' => '1',
            'titulo' => 'CONVOCATORIA CONFORMACIÓN CONSEJO DE ADMINISTRACIÓN',
            'texto' => 'aca va el texto',
            'imagen1' => 'http://157.253.198.43/conjuntos6/public/img/comunicados/ZzXFFZwJ6wLFzJaf9OkotRS8OuQHSmht6jTIpjvR.jpeg',
            'documento1' => 'http://157.253.198.43/conjuntos6/public/documentos/conjuntos/CemxOLq8BZ9VxXSHvpUAtz38vka4SHB9vuQ9Gv2c.pdf'         
        ]);


        Comunicados::create([
            'conjunto_id' => '1',
            'titulo' => 'SOCIALIZACIÓN PROYECTO MANUAL DE CONVIVENCIA',
            'texto' => 'aca va el texto',
            'imagen1' => 'http://157.253.198.43/conjuntos6/public/img/comunicados/ZzXFFZwJ6wLFzJaf9OkotRS8OuQHSmht6jTIpjvR.jpeg',
            'documento1' => 'http://157.253.198.43/conjuntos6/public/documentos/conjuntos/CemxOLq8BZ9VxXSHvpUAtz38vka4SHB9vuQ9Gv2c.pdf'         
        ]);


    }
}
