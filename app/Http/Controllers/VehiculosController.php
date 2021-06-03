<?php

namespace App\Http\Controllers;

use App\Vehiculos;
use App\BienesParqueaderos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($inmueble)
    {

        $conjunto = DB::table('bienes')->select('conjunto_id')->where('id',$inmueble)->where('status', 1)->first();
        $conjunto = $conjunto->conjunto_id;

        $tipos = DB::table('parqueaderos')
                ->leftJoin('opciones', 'parqueaderos.tipo_id', '=', 'opciones.id')
                ->select('opciones.id', 'opciones.nombre')
                ->where('parqueaderos.conjunto_id', $conjunto)
                ->groupBy('opciones.nombre')
                ->orderByRaw('opciones.nombre ASC')
                ->get();


        $usuarios = DB::table('usuarios_bienes')
                ->leftJoin('users', 'usuarios_bienes.usuario_id', '=', 'users.id')
                ->leftJoin('bienes', 'usuarios_bienes.bien_id', '=', 'bienes.id')
                ->select('users.id as usuario_id', 
                         'bienes.*',
                         DB::raw('CONCAT(users.name, " " ,users.last) AS nomusuario'))
                ->where('usuarios_bienes.status', 1)
                ->where('usuarios_bienes.bien_id', $inmueble)
                ->orderByRaw('users.name ASC')
                ->get();  


        $data = DB::table('bienes')
            ->leftjoin('torres', 'bienes.torre_id', '=', 'torres.id')
            ->leftjoin('conjuntos', 'bienes.conjunto_id', '=', 'conjuntos.id')
            ->select(
                'bienes.*',
                'torres.nombre AS nomtorre',
                'conjuntos.nombre AS nomconjunto')
            ->where('bienes.id',$inmueble)
            ->first();   


        $colores = DB::table('opciones')->where('tipos_id', 5)->where('status', 1)->orderByRaw('nombre ASC')->get();

        //$inmueble = $inmueble;


        return view ('vehiculos.create')->with (compact('conjunto', 'inmueble', 'data','tipos', 'usuarios', 'colores'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $conjunto, $inmueble)
    {
        $request['bien_id'] = $inmueble;
        $request['user_create'] = Auth::id();
        $data = Vehiculos::create($request->all());

        $request['vehiculo_id'] = $data->id;
        $data2 = BienesParqueaderos::create($request->all());         

        return redirect ('residentes/'.$inmueble.'/view')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculos $vehiculos)
    {
        //
    }


    public function edit($inmueble, $vehiculo)
    {
        //Permisos
        $validar = DB::table('bienes_parqueaderos')
                    ->select('id')
                     ->where('id', $vehiculo)
                     ->where('bien_id', $inmueble)
                    ->count();   
        
        if($validar == 0){
            return back();
        }

        $conjunto = DB::table('bienes')->select('conjunto_id')->where('id',$inmueble)->where('status', 1)->first();
        $conjunto = $conjunto->conjunto_id;

        $data = DB::table('bienes_parqueaderos')
                ->leftJoin('bienes', 'bienes_parqueaderos.bien_id', '=', 'bienes.id')
                ->leftJoin('torres', 'bienes.torre_id', '=', 'torres.id')
                ->leftJoin('conjuntos', 'bienes.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('users', 'bienes_parqueaderos.usuario_id', '=', 'users.id')
                ->leftJoin('vehiculos', 'bienes_parqueaderos.vehiculo_id', '=', 'vehiculos.id')
                ->select('bienes_parqueaderos.*',
                         'bienes_parqueaderos.id as bp_id',
                         'vehiculos.*',
                         'bienes.nombre as nomapto',
                         'torres.nombre as nomtorre',
                         'conjuntos.id as conjunto_id',
                         'conjuntos.nombre as nomconjunto',
                         'users.id as usuario_id')
                ->where('bienes_parqueaderos.status', 1)
                ->where('bienes_parqueaderos.bien_id', $inmueble)
                ->where('bienes_parqueaderos.vehiculo_id', $vehiculo)
                ->first(); 
        //dd($data);

        $tipos = DB::table('parqueaderos')
                ->leftJoin('opciones', 'parqueaderos.tipo_id', '=', 'opciones.id')
                ->select('opciones.id', 'opciones.nombre')
                ->where('parqueaderos.conjunto_id', $conjunto)
                ->groupBy('opciones.nombre')
                ->orderByRaw('opciones.nombre ASC')
                ->get();

        $espacios = DB::table('parqueaderos')
                ->select('parqueaderos.*')
                ->where('parqueaderos.conjunto_id', $conjunto)
                ->where('parqueaderos.tipo_id', $data->tipo_id)
                ->orderByRaw('parqueaderos.id ASC')
                ->get();

        $usuarios = DB::table('usuarios_bienes')
                ->leftJoin('users', 'usuarios_bienes.usuario_id', '=', 'users.id')
                ->leftJoin('bienes', 'usuarios_bienes.bien_id', '=', 'bienes.id')
                ->select('users.id as usuario_id', 
                         'bienes.*',
                         DB::raw('CONCAT(users.name, " " ,users.last) AS nomusuario'))
                ->where('usuarios_bienes.status', 1)
                ->where('usuarios_bienes.bien_id', $inmueble)
                ->orderByRaw('users.name ASC')
                ->get();  

        $colores = DB::table('opciones')->where('tipos_id', 5)->where('status', 1)->orderByRaw('nombre ASC')->get();
        $marcas = DB::table('marcas')->where('tipo', $data->tipo_id)->where('status', 1)->orderByRaw('marca ASC')->get();


        return view ('vehiculos.edit')->with (compact('data', 'conjunto','tipos', 'usuarios', 'colores', 'marcas', 'espacios', 'inmueble'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $vehiculo = DB::table('bienes_parqueaderos')->select('vehiculo_id')->where('id',$id)->first();

        $request['user_update'] = Auth::id();
        $datos = Vehiculos::find($vehiculo->vehiculo_id)->update($request->all());

        $request['user_update'] = Auth::id();
        $datos = BienesParqueaderos::find($id)->update($request->all());
   

        return redirect ('residentes/'.$request->input('inmueble').'/view')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculos $vehiculos)
    {
        //
    }


    public function byGroup($conjunto, $tipo){

        $parqueaderos = DB::table('parqueaderos')
                ->select('id', 'nombre')
                ->where('conjunto_id', $conjunto)
                ->where('tipo_id', $tipo)
                ->where('status', 1)
                ->orderByRaw('id ASC')
                ->get();

        return $parqueaderos;     
    }


    public function byGroup2($id){

        $marca = DB::table('marcas')
                ->select('id', 'marca')
                ->where('tipo', $id)
                ->where('status', 1)
                ->orderByRaw('marca ASC')
                ->get();

        return $marca;     
    }


    public function active_vehiculo_conjunto($bien, $vehiculo) 
    {
        $data = DB::table('bienes_parqueaderos')
                    ->where('bien_id', $bien)
                    ->where('vehiculo_id', $vehiculo)
                    ->update(['status' => '1']);

        return redirect ('bienes')->with('success', 'Registro activado exitosamente');
    }


    public function inactive_vehiculo_conjunto($bien, $vehiculo) 
    {

        $data = DB::table('bienes_parqueaderos')
                    ->where('bien_id', $bien)
                    ->where('vehiculo_id', $vehiculo)
                    ->update(['status' => '2']);

        return redirect ('residentes/'.$bien.'/view')->with('eliminar', 'ok');
    }

}
