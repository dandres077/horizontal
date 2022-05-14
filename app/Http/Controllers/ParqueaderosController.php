<?php

namespace App\Http\Controllers;

use App\Parqueaderos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Funciones;
use DB;

class ParqueaderosController extends Controller
{
    use Funciones;

    public function index()
    {
        $permiso = $this->permisos(Auth::id()); 

        if($permiso == 1)
        {
            $data = DB::table('parqueaderos')
                ->leftJoin('conjuntos', 'parqueaderos.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('opciones', 'parqueaderos.tipo_id', '=', 'opciones.id')
                ->leftJoin('users', 'parqueaderos.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'parqueaderos.user_update', '=', 'users2.id')
                ->select(
                        'parqueaderos.*',
                        'conjuntos.nombre AS nomconjunto',
                        'opciones.nombre AS nomopcion',
                        DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                        DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('2,3,4')
                ->get();
        }
        elseif($permiso == 2)
        {
            $data = DB::table('parqueaderos')
                ->leftJoin('conjuntos', 'parqueaderos.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('opciones', 'parqueaderos.tipo_id', '=', 'opciones.id')
                ->leftJoin('users', 'parqueaderos.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'parqueaderos.user_update', '=', 'users2.id')
                ->select(
                        'parqueaderos.*',
                        'conjuntos.nombre AS nomconjunto',
                        'opciones.nombre AS nomopcion',
                        DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                        DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->where('parqueaderos.conjunto_id', Auth::user()->conjunto_id)
                ->orderByRaw('2,3,4')
                ->get();
        }
        


        return view ('parqueaderos.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $tipos = DB::table('opciones')->where('tipos_id', '=', 4)->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('parqueaderos.create')->with (compact('conjuntos', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['user_create'] = Auth::id();
        $data = Parqueaderos::create($request->all()); 

        return redirect ('parqueaderos')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Parqueaderos::find($id); 
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $tipos = DB::table('opciones')->where('tipos_id', '=', 4)->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return view ('parqueaderos.edit')->with(compact('data', 'conjuntos', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['user_create'] = Auth::id();
        $datos = Parqueaderos::find($id)->update($request->all());

        return redirect ('parqueaderos')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //
    }


    public function active($id) 
    {
        $data = Parqueaderos::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('parqueaderos')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Parqueaderos::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('parqueaderos')->with('success', 'Registro inactivado exitosamente');
    }
}
