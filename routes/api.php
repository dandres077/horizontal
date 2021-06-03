<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/departamento/{id}','CiudadesController@byGroup'); // Visualiza los departamentos de acuerdo al país

Route::get('/ciudad/{id}','CiudadesController@byGroup2'); // Visualiza las ciudades por departamento

Route::get('/torre/{id}','BienesController@byGroup'); 

Route::get('/tipoinmueble/{id}','BienesController@byGroup2'); 

Route::get('/conjunto/{conjunto}/parqueaderos/{tipo}','VehiculosController@byGroup'); // Visualiza los espacios disponibles de un parqueadero por conjunto

Route::get('/marcas/{id}/','VehiculosController@byGroup2'); // Marcas por tipo de vehiculo

Route::get('/conjunto/{id}/','VehiculosController@byGroup2'); // Marcas por tipo de vehiculo

Route::get('/conjunto/{conjunto}/opcion/{id}/','ConsumosWebController@opcion'); // Visualiza las opciones de parqueadero, elementos, tipos de inmuebles