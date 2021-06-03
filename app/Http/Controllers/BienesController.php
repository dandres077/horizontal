<?php

namespace App\Http\Controllers;

use App\Bienes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Funciones;
use DB;

class BienesController extends Controller
{
    use Funciones;

    public function index()
    {
        $permiso = $this->permisos(Auth::id()); 
        
        if($permiso == 1)
        {
            $data = DB::table('bienes')
                ->leftJoin('conjuntos', 'bienes.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('torres', 'bienes.torre_id', '=', 'torres.id')
                ->leftJoin('metros_bienes', 'bienes.metrosbienes_id', '=', 'metros_bienes.id')
                ->leftJoin('users', 'bienes.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'bienes.user_update', '=', 'users2.id')
                ->select(
                'bienes.*',
                'conjuntos.nombre AS nomconjunto',
                'torres.nombre AS nomtorre',
                'metros_bienes.nombre AS nommetro',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('2,3, 4')
                ->get();

        }elseif($permiso == 2){

            $data = DB::table('bienes')
                ->leftJoin('conjuntos', 'bienes.conjunto_id', '=', 'conjuntos.id')
                ->leftJoin('torres', 'bienes.torre_id', '=', 'torres.id')
                ->leftJoin('metros_bienes', 'bienes.metrosbienes_id', '=', 'metros_bienes.id')
                ->leftJoin('users', 'bienes.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'bienes.user_update', '=', 'users2.id')
                ->select(
                'bienes.*',
                'conjuntos.nombre AS nomconjunto',
                'torres.nombre AS nomtorre',
                'metros_bienes.nombre AS nommetro',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->where('bienes.conjunto_id', Auth::user()->conjunto_id)
                ->orderByRaw('2,3, 4')
                ->get();
        }
        


        return view ('bienes.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $torres = DB::table('torres')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $metros = DB::table('metros_bienes')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();

        return view ('bienes.create')->with (compact('conjuntos', 'torres', 'metros'));
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
        $data = Bienes::create($request->all());

        return redirect ('bienes')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bienes  $bienes
     * @return \Illuminate\Http\Response
     */
    public function show(Bienes $bienes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bienes  $bienes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bienes::find($id); 
        $conjuntos = DB::table('conjuntos')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $torres = DB::table('torres')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        $metros = DB::table('metros_bienes')->where('status', '=', 1)->orderByRaw('nombre ASC')->get();

        return view ('bienes.edit')->with (compact('conjuntos', 'torres', 'metros', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bienes  $bienes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['user_create'] = Auth::id();
        $datos = Bienes::find($id)->update($request->all());

        return redirect ('bienes')->with('success', 'Registro actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bienes  $bienes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bienes $bienes)
    {
        //
    }

    public function active($id) 
    {
        $data = Bienes::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('bienes')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Bienes::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('bienes')->with('success', 'Registro inactivado exitosamente');
    }

    public function byGroup($id){

        $dpto = DB::table('torres')->where('conjunto_id', $id)->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return $dpto;     
    }

    public function byGroup2($id){

        $data = DB::table('metros_bienes')->where('conjunto_id', $id)->where('status', '=', 1)->orderByRaw('nombre ASC')->get();
        return $data;     
    }
}
