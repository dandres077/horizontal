<?php

namespace App\Http\Controllers;

use App\ValoresConjuntos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Funciones;
use DB;

class ValoresConjuntosController extends Controller
{
    use Funciones;

    public function index()
    {   
        $permiso = $this->permisos(Auth::id()); 
 
        if($permiso == 1)
        {
            $data = DB::select('SELECT 
                    valores_conjuntos.id,
                    valores_conjuntos.item_id,
                    case item_id  when 1 then "Inmueble"  when 2 then "Parqueadero" when 3 then "Elemento" end as item,
                    case item_id  when 1 then (SELECT nombre FROM metros_bienes WHERE id = opcion_id) when 2 then (SELECT nombre FROM opciones WHERE id = opcion_id) when 3 then (SELECT nombre FROM elementos WHERE id = opcion_id) end as nom_requerimiento,
                    valores_conjuntos.valor,
                    valores_conjuntos.descripcion,
                    valores_conjuntos.status,
                    conjuntos.nombre AS nomconjunto
                    FROM `valores_conjuntos`
                    LEFT JOIN conjuntos ON valores_conjuntos.conjunto_id = conjuntos.id
                    WHERE
                    valores_conjuntos.status != 3
                    ORDER BY 2, 4 ASC');

        }elseif($permiso == 2){ 

            $data = DB::select('SELECT 
                    valores_conjuntos.id,
                    valores_conjuntos.item_id,
                    case item_id  when 1 then "Inmueble"  when 2 then "Parqueadero" when 3 then "Elemento" end as item,
                    case item_id  when 1 then (SELECT nombre FROM metros_bienes WHERE id = opcion_id) when 2 then (SELECT nombre FROM opciones WHERE id = opcion_id) when 3 then (SELECT nombre FROM elementos WHERE id = opcion_id) end as nom_requerimiento,
                    valores_conjuntos.valor,
                    valores_conjuntos.descripcion,
                    valores_conjuntos.status,
                    conjuntos.nombre AS nomconjunto
                    FROM `valores_conjuntos`
                    LEFT JOIN conjuntos ON valores_conjuntos.conjunto_id = conjuntos.id
                    WHERE
                    valores_conjuntos.conjunto_id = :conjunto_id AND
                    valores_conjuntos.status != 3
                    ORDER BY 2, 4 ASC', ["conjunto_id" => Auth::user()->conjunto_id]);

        }

        return view ('valores.index')->with (compact('data'));
    }


    public function create()
    {
        $permiso = $this->permisos(Auth::id()); 

        if($permiso == 1)
        {
            $conjuntos = DB::table('conjuntos')->where('status', 1)->orderByRaw('nombre ASC')->get();
            $periodos = DB::table('periodos')->where('status',  1)->orderByRaw('nombre ASC')->get();

        }elseif($permiso == 2){

            $conjuntos = DB::table('conjuntos')->where('id', Auth::user()->conjunto_id)->where('status', 1)->orderByRaw('nombre ASC')->get();
            $periodos = DB::table('periodos')->where('conjunto_id', Auth::user()->conjunto_id)->where('status',  1)->orderByRaw('nombre ASC')->get();
        }

        return view ('valores.create')->with (compact('conjuntos', 'periodos'));
    }


    public function store(Request $request)
    {

        $request['user_create'] = Auth::id();
        $data = ValoresConjuntos::create($request->all());

        return redirect ('valores')->with('success', 'Registro creado exitosamente');
    }


    public function show()
    {

        $data = DB::select('SELECT 
                    valores_conjuntos.id,
                    valores_conjuntos.item_id,
                    case item_id  when 1 then "Inmueble"  when 2 then "Parqueadero" when 3 then "Elemento" end as item,
                    case item_id  when 1 then (SELECT nombre FROM metros_bienes WHERE id = opcion_id) when 2 then (SELECT nombre FROM opciones WHERE id = opcion_id) when 3 then (SELECT nombre FROM elementos WHERE id = opcion_id) end as nom_requerimiento,
                    valores_conjuntos.valor,
                    valores_conjuntos.descripcion,
                    valores_conjuntos.status,
                    conjuntos.nombre AS nomconjunto
                    FROM `valores_conjuntos`
                    LEFT JOIN conjuntos ON valores_conjuntos.conjunto_id = conjuntos.id
                    WHERE
                    valores_conjuntos.conjunto_id = :conjunto_id AND
                    valores_conjuntos.status != 3
                    ORDER BY 2, 4 ASC', ["conjunto_id" => Auth::user()->conjunto_id]);
        

        return view ('valores.show')->with(compact('data'));
    }


    public function edit($id)
    {
        //Políticas
        $proyectos = ValoresConjuntos::find($id); 
        $this->authorize('view', $proyectos);  
        //Fin Políticas 

        $data = DB::table('valores_conjuntos')->where('id', $id)->orderByRaw('id DESC')->get();

        $permiso = $this->permisos(Auth::id()); 
        
        if($permiso == 1)
        {
            $conjuntos = DB::table('conjuntos')->where('status', 1)->orderByRaw('nombre ASC')->get();
            $periodos = DB::table('periodos')->where('status',  1)->orderByRaw('nombre ASC')->get();

            if ($data[0]->item_id = 1) {

                $opciones = DB::table('metros_bienes')
                        ->select(
                                'metros_bienes.id',
                                'metros_bienes.nombre')
                        ->orderByRaw('metros_bienes.nombre ASC')
                        ->get();
    
            }elseif ($data[0]->item_id = 2) {
            
                $opciones = DB::table('opciones')
                    ->select(
                            'opciones.id',
                            'opciones.nombre')
                    ->where('opciones.tipos_id', 4)
                    ->orderByRaw('opciones.nombre ASC')
                    ->get();
    
            }elseif ($data[0]->item_id = 3) {
                
                $opciones = DB::table('elementos')
                    ->select(
                            'elementos.id',
                            'elementos.nombre')
                    ->orderByRaw('elementos.nombre ASC')
                    ->get();
            }

        }elseif($permiso == 2){
            if ($data[0]->item_id = 1) {

                $opciones = DB::table('metros_bienes')
                        ->select(
                                'metros_bienes.id',
                                'metros_bienes.nombre')
                        ->where('metros_bienes.conjunto_id', Auth::user()->conjunto_id)
                        ->orderByRaw('metros_bienes.nombre ASC')
                        ->get();
    
            }elseif ($data[0]->item_id = 2) {
            
                $opciones = DB::table('opciones')
                    ->select(
                            'opciones.id',
                            'opciones.nombre')
                    ->where('opciones.tipos_id', 4)
                    ->orderByRaw('opciones.nombre ASC')
                    ->get();
    
            }elseif ($data[0]->item_id = 3) {
                
                $opciones = DB::table('elementos')
                    ->select(
                            'elementos.id',
                            'elementos.nombre')
                    ->where('elementos.conjunto_id', Auth::user()->conjunto_id)
                    ->orderByRaw('elementos.nombre ASC')
                    ->get();
            }

            $conjuntos = DB::table('conjuntos')->where('id', Auth::user()->conjunto_id)->where('status', 1)->orderByRaw('nombre ASC')->get();
            $periodos = DB::table('periodos')->where('conjunto_id', Auth::user()->conjunto_id)->where('status',  1)->orderByRaw('nombre ASC')->get();
        }

        return view ('valores.edit')->with(compact('data', 'conjuntos', 'periodos', 'opciones'));
    }


    public function update(Request $request, $id)
    {
        //Políticas
        $valores = ValoresConjuntos::find($id); 
        $this->authorize('view', $valores); 
        
        $request['user_create'] = Auth::id();
        $data = ValoresConjuntos::find($id)->update($request->all());

        return redirect ('valores')->with('success', 'Registro actualizado exitosamente');
    }


    public function destroy(Marca $marca)
    {
        //
    }


    public function active($id) 
    {
        //Políticas
        $valores = ValoresConjuntos::find($id); 
        $this->authorize('view', $valores); 

        $data = ValoresConjuntos::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('valores')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {
        //Políticas
        $valores = ValoresConjuntos::find($id); 
        $this->authorize('view', $valores);  
    
        $data = ValoresConjuntos::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('valores')->with('success', 'Registro inactivado exitosamente');
    }
    

}
