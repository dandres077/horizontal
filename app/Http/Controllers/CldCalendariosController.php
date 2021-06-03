<?php

namespace App\Http\Controllers;

use App\Cld_Calendarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CldCalendariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('cld__calendarios')
                ->leftJoin('users', 'cld__calendarios.user_create', '=', 'users.id')
                ->leftJoin('users as users2', 'cld__calendarios.user_update', '=', 'users2.id')
                ->select(
                'cld__calendarios.*',
                DB::raw('CONCAT(users.name, " " ,users.last) AS creo'),
                DB::raw('CONCAT(users2.name, " " ,users2.last) AS actualizo'))
                ->orderByRaw('cld__calendarios.id DESC')
                ->get();


        return view ('cls_calendarios.index')->with (compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cls_calendarios.create');
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
        $data = Cld_Calendarios::create($request->all());


        return redirect ('calendarios')->with('success', 'Registro creado exitosamente');
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
        $data = Cld_Calendarios::find($id); 
        return view ('cls_calendarios.edit')->with(compact('data'));
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
        $datos = Cld_Calendarios::find($id)->update($request->all());

        return redirect ('calendarios')->with('success', 'Registro actualizado exitosamente');
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
        $data = Cld_Calendarios::find($id);
        $data->status = '1'; //Activo
        $data->save();

        return redirect ('calendarios')->with('success', 'Registro activado exitosamente');
    }


    public function inactive($id) 
    {

        $data = Cld_Calendarios::find($id);
        $data->status = '2';//Inactivo
        $data->save();

        return redirect ('calendarios')->with('success', 'Registro inactivado exitosamente');
    }
}
