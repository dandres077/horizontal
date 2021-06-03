<?php

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['auth'])->group(function () {

	Route::get('/home', 'HomeController@index')->name('home.index')->middleware('permiso:home.index');  
	Route::get('/usuario', 'HomeController@usuario')->name('home.usuario')->middleware('permiso:home.usuario');  
	Route::get('/administrador', 'HomeController@administrador')->name('home.administrador')->middleware('permiso:home.administrador');  

/*
|--------------------------------------------------------------------------
| Usuarios -->OK
|--------------------------------------------------------------------------
|
*/
	Route::get('/usuarios', 'UserController@index')->middleware('permiso:usuarios.index'); 
	Route::get('/usuarios/create', 'UserController@create')->middleware('permiso:usuarios.create'); 
	Route::post('/usuarios/store', 'UserController@store')->middleware('permiso:usuarios.store'); 
	Route::get('/usuarios/{id}/edit', 'UserController@edit')->middleware('permiso:usuarios.edit'); 
	Route::post('/usuarios/{id}/edit', 'UserController@update')->middleware('permiso:usuarios.update'); 
	Route::post('/usuarios/{id}/delete', 'UserController@destroy')->middleware('permiso:usuarios.destroy'); 
	Route::post('/usuarios/{id}/pwd', 'UserController@changepwd')->middleware('permiso:usuarios.changepwd'); 
	Route::post('/usuarios/{id}/active', 'UserController@active')->middleware('permiso:usuarios.active'); 
	Route::post('/usuarios/{id}/inactive', 'UserController@inactive')->middleware('permiso:usuarios.inactive');


/*
|--------------------------------------------------------------------------
| Roles
|--------------------------------------------------------------------------
|
*/
	Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permiso:roles.store');
	Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permiso:roles.index');
	Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permiso:roles.create');
	Route::post('roles/{id}/edit', 'RoleController@update')->name('roles.update')->middleware('permiso:roles.update');
	Route::get('roles/{id}', 'RoleController@show')->name('roles.show')->middleware('permiso:roles.show');
	Route::delete('roles/{id}', 'RoleController@destroy')->name('roles.destroy')->middleware('permiso:roles.destroy');
	Route::get('roles/{id}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permiso:roles.edit');


/*
|--------------------------------------------------------------------------
| Roles
|--------------------------------------------------------------------------
|
*/
	Route::post('permisos/store', 'PermisosController@store')->name('permisos.store')->middleware('permiso:permisos.store');
	Route::get('permisos', 'PermisosController@index')->name('permisos.index')->middleware('permiso:permisos.index');
	Route::get('permisos/create', 'PermisosController@create')->name('permisos.create')->middleware('permiso:permisos.create');
	Route::put('permisos/{role}', 'PermisosController@modificar')->name('permisos.modificar')->middleware('permiso:permisos.modificar');
	Route::get('permisos/{role}', 'PermisosController@show')->name('permisos.show')->middleware('permiso:permisos.show');
	Route::delete('permisos/{role}', 'PermisosController@destroy')->name('permisos.destroy')->middleware('permiso:permisos.destroy');
	Route::get('permisos/{role}/edit', 'PermisosController@edit')->name('permisos.edit')->middleware('permiso:permisos.edit');


/*
|--------------------------------------------------------------------------
| Panel de administrador
|--------------------------------------------------------------------------
|
*/
	Route::get('panel', 'PanelAdminController@index')->name('panel.index')->middleware('permiso:panel.index'); 


/*
|--------------------------------------------------------------------------
| País
|--------------------------------------------------------------------------
|
*/
	Route::get('paises', 'PaisesController@index')->name('paises.index')->middleware('permiso:paises.index'); 
	Route::get('paises/create', 'PaisesController@create')->name('paises.create')->middleware('permiso:paises.create'); 
	Route::post('paises/store', 'PaisesController@store')->name('paises.store')->middleware('permiso:paises.store'); 
	Route::get('paises/{id}/edit', 'PaisesController@edit')->name('paises.edit')->middleware('permiso:paises.edit'); 
	Route::post('paises/{id}/edit', 'PaisesController@update')->name('paises.update')->middleware('permiso:paises.update'); 
	Route::post('paises/{id}/delete', 'PaisesController@destroy')->name('paises.destroy')->middleware('permiso:paises.destroy'); 
	Route::post('paises/{id}/active', 'PaisesController@active')->name('paises.active')->middleware('permiso:paises.active'); 
	Route::post('paises/{id}/inactive', 'PaisesController@inactive')->name('paises.inactive')->middleware('permiso:paises.inactive'); 


/*
|--------------------------------------------------------------------------
| Departamentos
|--------------------------------------------------------------------------
|
*/
	Route::get('departamentos', 'DepartamentosController@index')->name('departamentos.index')->middleware('permiso:departamentos.index'); 
	Route::get('departamentos/create', 'DepartamentosController@create')->name('departamentos.create')->middleware('permiso:departamentos.create'); 
	Route::post('departamentos/store', 'DepartamentosController@store')->name('departamentos.store')->middleware('permiso:departamentos.store'); 
	Route::get('departamentos/{id}/edit', 'DepartamentosController@edit')->name('departamentos.edit')->middleware('permiso:departamentos.edit'); 
	Route::post('departamentos/{id}/edit', 'DepartamentosController@update')->name('departamentos.update')->middleware('permiso:departamentos.update'); 
	Route::post('departamentos/{id}/delete', 'DepartamentosController@destroy')->name('departamentos.destroy')->middleware('permiso:departamentos.destroy'); 
	Route::post('departamentos/{id}/active', 'DepartamentosController@active')->name('departamentos.active')->middleware('permiso:departamentos.active'); 
	Route::post('departamentos/{id}/inactive', 'DepartamentosController@inactive')->name('departamentos.inactive')->middleware('permiso:departamentos.inactive'); 


/*
|--------------------------------------------------------------------------
| Ciudades
|--------------------------------------------------------------------------
|
*/
	Route::get('ciudades', 'CiudadesController@index')->name('ciudades.index')->middleware('permiso:ciudades.index'); 
	Route::get('ciudades/create', 'CiudadesController@create')->name('ciudades.create')->middleware('permiso:ciudades.create'); 
	Route::post('ciudades/store', 'CiudadesController@store')->name('ciudades.store')->middleware('permiso:ciudades.store'); 
	Route::get('ciudades/{id}/edit', 'CiudadesController@edit')->name('ciudades.edit')->middleware('permiso:ciudades.edit'); 
	Route::post('ciudades/{id}/edit', 'CiudadesController@update')->name('ciudades.update')->middleware('permiso:ciudades.update'); 
	Route::post('ciudades/{id}/delete', 'CiudadesController@destroy')->name('ciudades.destroy')->middleware('permiso:ciudades.destroy'); 
	Route::post('ciudades/{id}/active', 'CiudadesController@active')->name('ciudades.active')->middleware('permiso:ciudades.active'); 
	Route::post('ciudades/{id}/inactive', 'CiudadesController@inactive')->name('ciudades.inactive')->middleware('permiso:ciudades.inactive'); 

/*
|--------------------------------------------------------------------------
| Genero (sexo)
|--------------------------------------------------------------------------
|
*/
	Route::get('generos', 'SexosController@index')->name('generos.index')->middleware('permiso:generos.index'); 
	Route::get('generos/create', 'SexosController@create')->name('generos.create')->middleware('permiso:generos.create'); 
	Route::post('generos', 'SexosController@store')->name('generos.store')->middleware('permiso:generos.store'); 
	Route::get('generos/{id}/edit', 'SexosController@edit')->name('generos.edit')->middleware('permiso:generos.edit'); 
	Route::post('generos/{id}/edit', 'SexosController@update')->name('generos.update')->middleware('permiso:generos.update'); 
	Route::post('generos/{id}/delete', 'SexosController@destroy')->name('generos.destroy')->middleware('permiso:generos.destroy'); 
	Route::post('generos/{id}/active', 'SexosController@active')->name('generos.active')->middleware('permiso:generos.active'); 
	Route::post('generos/{id}/inactive', 'SexosController@inactive')->name('generos.inactive')->middleware('permiso:generos.inactive'); 


/*
|--------------------------------------------------------------------------
| Marcas
|--------------------------------------------------------------------------
|
*/
	Route::get('marcas', 'MarcasController@index')->name('marcas.index')->middleware('permiso:marcas.index'); 
	Route::get('marcas/create', 'MarcasController@create')->name('marcas.create')->middleware('permiso:marcas.create'); 
	Route::post('marcas', 'MarcasController@store')->name('marcas.store')->middleware('permiso:marcas.store'); 
	Route::get('marcas/{id}/edit', 'MarcasController@edit')->name('marcas.edit')->middleware('permiso:marcas.edit'); 
	Route::post('marcas/{id}/edit', 'MarcasController@update')->name('marcas.update')->middleware('permiso:marcas.update'); 
	Route::post('marcas/{id}/delete', 'MarcasController@destroy')->name('marcas.destroy')->middleware('permiso:marcas.destroy'); 
	Route::post('marcas/{id}/active', 'MarcasController@active')->name('marcas.active')->middleware('permiso:marcas.active'); 
	Route::post('marcas/{id}/inactive', 'MarcasController@inactive')->name('marcas.inactive')->middleware('permiso:marcas.inactive'); 



/*
|--------------------------------------------------------------------------
| Opciones
|--------------------------------------------------------------------------
|
*/
	Route::get('opciones', 'OpcionesController@index')->name('opciones.index')->middleware('permiso:opciones.index'); 
	Route::get('opciones/create', 'OpcionesController@create')->name('opciones.create')->middleware('permiso:opciones.create'); 
	Route::post('opciones/store', 'OpcionesController@store')->name('opciones.store')->middleware('permiso:opciones.store'); 
	Route::get('opciones/{id}/edit', 'OpcionesController@edit')->name('opciones.edit')->middleware('permiso:opciones.edit'); 
	Route::post('opciones/{id}/edit', 'OpcionesController@update')->name('opciones.update')->middleware('permiso:opciones.update'); 
	Route::post('opciones/{id}/delete', 'OpcionesController@destroy')->name('opciones.destroy')->middleware('permiso:opciones.destroy'); 
	Route::post('opciones/{id}/active', 'OpcionesController@active')->name('opciones.active')->middleware('permiso:opciones.active'); 
	Route::post('opciones/{id}/inactive', 'OpcionesController@inactive')->name('opciones.inactive')->middleware('permiso:opciones.inactive'); 


/*
|--------------------------------------------------------------------------
| Tipos
|--------------------------------------------------------------------------
|
*/
	Route::get('tipos', 'TiposController@index')->name('tipos.index')->middleware('permiso:tipos.index'); 
	Route::get('tipos/create', 'TiposController@create')->name('tipos.create')->middleware('permiso:tipos.create'); 
	Route::post('tipos/store', 'TiposController@store')->name('tipos.store')->middleware('permiso:tipos.store'); 
	Route::get('tipos/{id}/edit', 'TiposController@edit')->name('tipos.edit')->middleware('permiso:tipos.edit'); 
	Route::post('tipos/{id}/edit', 'TiposController@update')->name('tipos.update')->middleware('permiso:tipos.update'); 
	Route::post('tipos/{id}/delete', 'TiposController@destroy')->name('tipos.destroy')->middleware('permiso:tipos.destroy'); 
	Route::post('tipos/{id}/active', 'TiposController@active')->name('tipos.active')->middleware('permiso:tipos.active'); 
	Route::post('tipos/{id}/inactive', 'TiposController@inactive')->name('tipos.inactive')->middleware('permiso:tipos.inactive'); 


/*
|--------------------------------------------------------------------------
| Conjuntos
|--------------------------------------------------------------------------
|
*/
	Route::get('conjuntos', 'ConjuntosController@index')->name('conjuntos.index')->middleware('permiso:conjuntos.index'); 
	Route::get('conjuntos/create', 'ConjuntosController@create')->name('conjuntos.create')->middleware('permiso:conjuntos.create'); 
	Route::post('conjuntos/store', 'ConjuntosController@store')->name('conjuntos.store')->middleware('permiso:conjuntos.store'); 
	Route::get('conjuntos/{id}/edit', 'ConjuntosController@edit')->name('conjuntos.edit')->middleware('permiso:conjuntos.edit'); 
	Route::post('conjuntos/{id}/edit', 'ConjuntosController@update')->name('conjuntos.update')->middleware('permiso:conjuntos.update'); 
	Route::post('conjuntos/{id}/delete', 'ConjuntosController@destroy')->name('conjuntos.destroy')->middleware('permiso:conjuntos.destroy'); 
	Route::post('conjuntos/{id}/active', 'ConjuntosController@active')->name('conjuntos.active')->middleware('permiso:conjuntos.active'); 
	Route::post('conjuntos/{id}/inactive', 'ConjuntosController@inactive')->name('conjuntos.inactive')->middleware('permiso:conjuntos.inactive'); 


/*
|--------------------------------------------------------------------------
| Torres
|--------------------------------------------------------------------------
|
*/
	Route::get('torres', 'TorresController@index')->name('torres.index')->middleware('permiso:torres.index'); 
	Route::get('torres/create', 'TorresController@create')->name('torres.create')->middleware('permiso:torres.create'); 
	Route::post('torres/store', 'TorresController@store')->name('torres.store')->middleware('permiso:torres.store'); 
	Route::get('torres/{id}/edit', 'TorresController@edit')->name('torres.edit')->middleware('permiso:torres.edit'); 
	Route::post('torres/{id}/edit', 'TorresController@update')->name('torres.update')->middleware('permiso:torres.update'); 
	Route::post('torres/{id}/delete', 'TorresController@destroy')->name('torres.destroy')->middleware('permiso:torres.destroy'); 
	Route::post('torres/{id}/active', 'TorresController@active')->name('torres.active')->middleware('permiso:torres.active'); 
	Route::post('torres/{id}/inactive', 'TorresController@inactive')->name('torres.inactive')->middleware('permiso:torres.inactive'); 


/*
|--------------------------------------------------------------------------
| Metros de un bien
|--------------------------------------------------------------------------
|
*/
	Route::get('metrosbienes', 'MetrosBienesController@index')->name('metrosbienes.index')->middleware('permiso:metrosbienes.index'); 
	Route::get('metrosbienes/create', 'MetrosBienesController@create')->name('metrosbienes.create')->middleware('permiso:metrosbienes.create'); 
	Route::post('metrosbienes/store', 'MetrosBienesController@store')->name('metrosbienes.store')->middleware('permiso:metrosbienes.store'); 
	Route::get('metrosbienes/{id}/edit', 'MetrosBienesController@edit')->name('metrosbienes.edit')->middleware('permiso:metrosbienes.edit'); 
	Route::post('metrosbienes/{id}/edit', 'MetrosBienesController@update')->name('metrosbienes.update')->middleware('permiso:metrosbienes.update'); 
	Route::post('metrosbienes/{id}/delete', 'MetrosBienesController@destroy')->name('metrosbienes.destroy')->middleware('permiso:metrosbienes.destroy'); 
	Route::post('metrosbienes/{id}/active', 'MetrosBienesController@active')->name('metrosbienes.active')->middleware('permiso:metrosbienes.active'); 
	Route::post('metrosbienes/{id}/inactive', 'MetrosBienesController@inactive')->name('metrosbienes.inactive')->middleware('permiso:metrosbienes.inactive'); 


/*
|--------------------------------------------------------------------------
| Vinculos de un conjunto
|--------------------------------------------------------------------------
|
*/
	Route::get('vinculos', 'VinculosController@index')->name('vinculos.index')->middleware('permiso:vinculos.index'); 
	Route::get('vinculos/create', 'VinculosController@create')->name('vinculos.create')->middleware('permiso:vinculos.create'); 
	Route::post('vinculos/store', 'VinculosController@store')->name('vinculos.store')->middleware('permiso:vinculos.store'); 
	Route::get('vinculos/{id}/edit', 'VinculosController@edit')->name('vinculos.edit')->middleware('permiso:vinculos.edit'); 
	Route::post('vinculos/{id}/edit', 'VinculosController@update')->name('vinculos.update')->middleware('permiso:vinculos.update'); 
	Route::post('vinculos/{id}/delete', 'VinculosController@destroy')->name('vinculos.destroy')->middleware('permiso:vinculos.destroy'); 
	Route::post('vinculos/{id}/active', 'VinculosController@active')->name('vinculos.active')->middleware('permiso:vinculos.active'); 
	Route::post('vinculos/{id}/inactive', 'VinculosController@inactive')->name('vinculos.inactive')->middleware('permiso:vinculos.inactive'); 
	Route::get('vinculos/ver', 'VinculosController@show')->name('vinculos.show')->middleware('permiso:vinculos.show'); 



/*
|--------------------------------------------------------------------------
| Bienes
|--------------------------------------------------------------------------
|
*/
	Route::get('bienes', 'BienesController@index')->name('bienes.index')->middleware('permiso:bienes.index'); 
	Route::get('bienes/create', 'BienesController@create')->name('bienes.create')->middleware('permiso:bienes.create'); 
	Route::post('bienes/store', 'BienesController@store')->name('bienes.store')->middleware('permiso:bienes.store'); 
	Route::get('bienes/{id}/edit', 'BienesController@edit')->name('bienes.edit')->middleware('permiso:bienes.edit'); 
	Route::post('bienes/{id}/edit', 'BienesController@update')->name('bienes.update')->middleware('permiso:bienes.update'); 
	Route::post('bienes/{id}/delete', 'BienesController@destroy')->name('bienes.destroy')->middleware('permiso:bienes.destroy'); 
	Route::post('bienes/{id}/active', 'BienesController@active')->name('bienes.active')->middleware('permiso:bienes.active'); 
	Route::post('bienes/{id}/inactive', 'BienesController@inactive')->name('bienes.inactive')->middleware('permiso:bienes.inactive'); 


/*
|--------------------------------------------------------------------------
| Parqueaderos
|--------------------------------------------------------------------------
|
*/
	Route::get('parqueaderos', 'ParqueaderosController@index')->name('parqueaderos.index')->middleware('permiso:parqueaderos.index'); 
	Route::get('parqueaderos/create', 'ParqueaderosController@create')->name('parqueaderos.create')->middleware('permiso:parqueaderos.create'); 
	Route::post('parqueaderos/store', 'ParqueaderosController@store')->name('parqueaderos.store')->middleware('permiso:parqueaderos.store'); 
	Route::get('parqueaderos/{id}/edit', 'ParqueaderosController@edit')->name('parqueaderos.edit')->middleware('permiso:parqueaderos.edit'); 
	Route::post('parqueaderos/{id}/edit', 'ParqueaderosController@update')->name('parqueaderos.update')->middleware('permiso:parqueaderos.update'); 
	Route::post('parqueaderos/{id}/delete', 'ParqueaderosController@destroy')->name('parqueaderos.destroy')->middleware('permiso:parqueaderos.destroy'); 
	Route::post('parqueaderos/{id}/active', 'ParqueaderosController@active')->name('parqueaderos.active')->middleware('permiso:parqueaderos.active'); 
	Route::post('parqueaderos/{id}/inactive', 'ParqueaderosController@inactive')->name('parqueaderos.inactive')->middleware('permiso:parqueaderos.inactive'); 


/*
|--------------------------------------------------------------------------
| Parqueaderos
|--------------------------------------------------------------------------
|
*/
	Route::get('residentes/{conjunto}', 'UserController@index_residente')->name('residentes.index_residente')->middleware('permiso:residentes.index_residente'); 
	Route::get('residentes/{id}/view', 'UserController@show_residente')->name('residentes.view_residente')->middleware('permiso:residentes.view_residente'); 
	Route::get('residentes/{id}/create', 'UserController@crear_residente')->name('residentes.crear_residente')->middleware('permiso:residentes.crear_residente'); 
	Route::post('residentes/{id}/store', 'UserController@store_residente')->name('residentes.store_residente')->middleware('permiso:residentes.store_residente'); 
	Route::get('residentes/{bien}/edit/{id}', 'UserController@edit_residente')->name('residentes.edit_residente')->middleware('permiso:residentes.edit_residente');
	Route::post('residentes/{bien}/edit/{id}', 'UserController@update_residente')->name('residentes.update_residente')->middleware('permiso:residentes.update_residente'); 
	Route::post('residentes/{bien}/inactive/{id}', 'UserController@inactive_user_conjunto')->name('residentes.active_user_conjunto')->middleware('permiso:residentes.active_user_conjunto'); 
	Route::post('residentes/{bien}/active/{id}', 'UserController@active_user_conjunto')->name('residentes.inactive_user_conjunto')->middleware('permiso:residentes.inactive_user_conjunto'); 






/*
|--------------------------------------------------------------------------
| Vehiculos
|--------------------------------------------------------------------------
|
*/
	Route::get('vehiculos/{conjunto}', 'VehiculosController@index')->name('vehiculos.index')->middleware('permiso:vehiculos.index'); 
	Route::get('vehiculos/{id}/view', 'VehiculosController@show')->name('vehiculos.view')->middleware('permiso:vehiculos.view'); 
	Route::get('vehiculos/{id}/create', 'VehiculosController@create')->name('vehiculos.create')->middleware('permiso:vehiculos.create'); 
	Route::post('vehiculos/{conjunto}/store/{bien}', 'VehiculosController@store')->name('vehiculos.store')->middleware('permiso:vehiculos.store'); 
	Route::get('vehiculos/{bien}/edit/{id}', 'VehiculosController@edit')->name('vehiculos.edit')->middleware('permiso:vehiculos.edit');
	Route::post('vehiculos/{id}/edit/', 'VehiculosController@update')->name('vehiculos.update')->middleware('permiso:vehiculos.update'); //Id: bien_parqueadero
	Route::post('vehiculos/{bien}/inactive/{id}', 'VehiculosController@inactive_vehiculo_conjunto')->name('vehiculos.active_vehiculo_conjunto')->middleware('permiso:vehiculos.active_vehiculo_conjunto'); 
	Route::post('vehiculos/{bien}/active/{id}', 'VehiculosController@active_vehiculo_conjunto')->name('vehiculos.inactive_vehiculo_conjunto')->middleware('permiso:vehiculos.inactive_vehiculo_conjunto'); 


/*
|--------------------------------------------------------------------------
| Mascotas
|--------------------------------------------------------------------------
|
*/
	Route::get('mascotas/{conjunto}', 'MascotasController@index')->name('mascotas.index')->middleware('permiso:mascotas.index'); 
	Route::get('mascotas/{id}/view', 'MascotasController@show')->name('mascotas.view')->middleware('permiso:mascotas.view'); 
	Route::get('mascotas/{id}/create', 'MascotasController@create')->name('mascotas.create')->middleware('permiso:mascotas.create'); 
	Route::post('mascotas/{conjunto}/store/{bien}', 'MascotasController@store')->name('mascotas.store')->middleware('permiso:mascotas.store'); 
	Route::get('mascotas/{bien}/edit/{id}', 'MascotasController@edit')->name('mascotas.edit')->middleware('permiso:mascotas.edit');
	Route::post('mascotas/{id}/edit/', 'MascotasController@update')->name('mascotas.update')->middleware('permiso:mascotas.update'); //Id: bien_parqueadero
	Route::post('mascotas/{bien}/inactive/{id}', 'MascotasController@inactive_mascota_conjunto')->name('mascotas.active_mascota_conjunto')->middleware('permiso:mascotas.active_mascota_conjunto'); 
	Route::post('mascotas/{bien}/active/{id}', 'MascotasController@active_mascota_conjunto')->name('mascotas.inactive_mascota_conjunto')->middleware('permiso:mascotas.inactive_mascota_conjunto'); 

/*
|--------------------------------------------------------------------------
| Comercios
|--------------------------------------------------------------------------
|
*/
	Route::get('comercios', 'ComerciosController@index')->name('comercios.index')->middleware('permiso:comercios.index'); 
	Route::get('comercios/create', 'ComerciosController@create')->name('comercios.create')->middleware('permiso:comercios.create'); 
	Route::post('comercios/store', 'ComerciosController@store')->name('comercios.store')->middleware('permiso:comercios.store'); 
	Route::get('comercios/{id}/edit', 'ComerciosController@edit')->name('comercios.edit')->middleware('permiso:comercios.edit'); 
	Route::post('comercios/{id}/edit', 'ComerciosController@update')->name('comercios.update')->middleware('permiso:comercios.update'); 
	Route::post('comercios/{id}/delete', 'ComerciosController@destroy')->name('comercios.destroy')->middleware('permiso:comercios.destroy'); 
	Route::post('comercios/{id}/active', 'ComerciosController@active')->name('comercios.active')->middleware('permiso:comercios.active'); 
	Route::post('comercios/{id}/inactive', 'ComerciosController@inactive')->name('comercios.inactive')->middleware('permiso:comercios.inactive'); 
    Route::get('comercios/ver', 'ComerciosController@show')->name('comercios.show')->middleware('permiso:comercios.show'); 


/*
|--------------------------------------------------------------------------
| Comercios
|--------------------------------------------------------------------------
|
*/
	Route::get('comunicados', 'ComunicadosController@index')->name('comunicados.index')->middleware('permiso:comunicados.index'); 
	Route::get('comunicados/create', 'ComunicadosController@create')->name('comunicados.create')->middleware('permiso:comunicados.create'); 
	Route::post('comunicados/store', 'ComunicadosController@store')->name('comunicados.store')->middleware('permiso:comunicados.store'); 
	Route::get('comunicados/{id}/edit', 'ComunicadosController@edit')->name('comunicados.edit')->middleware('permiso:comunicados.edit'); 
	Route::post('comunicados/{id}/edit', 'ComunicadosController@update')->name('comunicados.update')->middleware('permiso:comunicados.update'); 
	Route::post('comunicados/{id}/delete', 'ComunicadosController@destroy')->name('comunicados.destroy')->middleware('permiso:comunicados.destroy'); 
	Route::post('comunicados/{id}/active', 'ComunicadosController@active')->name('comunicados.active')->middleware('permiso:comunicados.active'); 
	Route::post('comunicados/{id}/inactive', 'ComunicadosController@inactive')->name('comunicados.inactive')->middleware('permiso:comunicados.inactive'); 
	Route::get('comunicados/{id}/show', 'ComunicadosController@show')->name('comunicados.show')->middleware('permiso:comunicados.show'); 
	Route::get('comunicados/ver', 'ComunicadosController@ver')->name('comunicados.ver')->middleware('permiso:comunicados.ver'); 


/*
|--------------------------------------------------------------------------
| Calendarios
|--------------------------------------------------------------------------
|
*/
	Route::get('calendarios', 'CldCalendariosController@index')->name('calendarios.index')->middleware('permiso:calendarios.index'); 
	Route::get('calendarios/create', 'CldCalendariosController@create')->name('calendarios.create')->middleware('permiso:calendarios.create'); 
	Route::post('calendarios/store', 'CldCalendariosController@store')->name('calendarios.store')->middleware('permiso:calendarios.store'); 
	Route::get('calendarios/{id}/edit', 'CldCalendariosController@edit')->name('calendarios.edit')->middleware('permiso:calendarios.edit'); 
	Route::post('calendarios/{id}/edit', 'CldCalendariosController@update')->name('calendarios.update')->middleware('permiso:calendarios.update'); 
	Route::post('calendarios/{id}/delete', 'CldCalendariosController@destroy')->name('calendarios.destroy')->middleware('permiso:calendarios.destroy'); 
	Route::post('calendarios/{id}/active', 'CldCalendariosController@active')->name('calendarios.active')->middleware('permiso:calendarios.active'); 
	Route::post('calendarios/{id}/inactive', 'CldCalendariosController@inactive')->name('calendarios.inactive')->middleware('permiso:calendarios.inactive'); 



/*
|--------------------------------------------------------------------------
| Mensajes
|--------------------------------------------------------------------------
|
*/
	Route::get('mensajes', 'MensajesController@index')->name('mensajes.index')->middleware('permiso:mensajes.index');  // Lista de correos
	Route::get('mensajes/create', 'MensajesController@create')->name('mensajes.create')->middleware('permiso:mensajes.create'); // Crear mensaje nuevo
	Route::post('mensajes/store', 'MensajesController@store')->name('mensajes.store')->middleware('permiso:mensajes.store'); // Guardar mensaje nuevo
	Route::get('mensajes/{id}/view', 'MensajesController@show')->name('mensajes.show')->middleware('permiso:mensajes.show'); // Ver correo
	Route::get('mensajes/{id}/edit', 'MensajesController@edit')->name('mensajes.edit')->middleware('permiso:mensajes.edit'); // Vista responder correo
	Route::post('mensajes/{id}/edit', 'MensajesController@update')->name('mensajes.update')->middleware('permiso:mensajes.update'); // Guardar mensaje respondido
	Route::get('mensajes/{id}/delete', 'MensajesController@destroy')->name('mensajes.destroy')->middleware('permiso:mensajes.destroy'); // Eliminar mensaje
	Route::get('mensajes/{id}/important/{estado}', 'MensajesController@important')->name('mensajes.important')->middleware('permiso:mensajes.important'); // Eliminar mensaje

	Route::get('mensajes/eliminados', 'MensajesController@trash')->name('mensajes.trash')->middleware('permiso:mensajes.trash');  // Lista de correos
	Route::get('mensajes/importantes', 'MensajesController@importantes')->name('mensajes.importantes')->middleware('permiso:mensajes.importantes');  // Lista de correos


/*
|--------------------------------------------------------------------------
| FAQ
|--------------------------------------------------------------------------
|
*/
	Route::get('faq', 'PreguntasFrecuentesController@index')->name('faq.index')->middleware('permiso:faq.index'); 
	Route::get('faq/create', 'PreguntasFrecuentesController@create')->name('faq.create')->middleware('permiso:faq.create'); 
	Route::post('faq/store', 'PreguntasFrecuentesController@store')->name('faq.store')->middleware('permiso:faq.store'); 
	Route::get('faq/{id}/edit', 'PreguntasFrecuentesController@edit')->name('faq.edit')->middleware('permiso:faq.edit'); 
	Route::post('faq/{id}/edit', 'PreguntasFrecuentesController@update')->name('faq.update')->middleware('permiso:faq.update'); 
	Route::post('faq/{id}/delete', 'PreguntasFrecuentesController@destroy')->name('faq.destroy')->middleware('permiso:faq.destroy'); 
	Route::post('faq/{id}/active', 'PreguntasFrecuentesController@active')->name('faq.active')->middleware('permiso:faq.active'); 
	Route::post('faq/{id}/inactive', 'PreguntasFrecuentesController@inactive')->name('faq.inactive')->middleware('permiso:faq.inactive');
	Route::get('faq/ver', 'PreguntasFrecuentesController@show')->name('faq.show')->middleware('permiso:faq.show');  


/*
|--------------------------------------------------------------------------
| Periodos
|--------------------------------------------------------------------------
|
*/
	Route::get('periodos', 'PeriodosController@index')->name('periodos.index')->middleware('permiso:periodos.index'); 
	Route::get('periodos/create', 'PeriodosController@create')->name('periodos.create')->middleware('permiso:periodos.create'); 
	Route::post('periodos/store', 'PeriodosController@store')->name('periodos.store')->middleware('permiso:periodos.store'); 
	Route::get('periodos/{id}/edit', 'PeriodosController@edit')->name('periodos.edit')->middleware('permiso:periodos.edit'); 
	Route::post('periodos/{id}/edit', 'PeriodosController@update')->name('periodos.update')->middleware('permiso:periodos.update'); 
	Route::post('periodos/{id}/delete', 'PeriodosController@destroy')->name('periodos.destroy')->middleware('permiso:periodos.destroy'); 
	Route::post('periodos/{id}/active', 'PeriodosController@active')->name('periodos.active')->middleware('permiso:periodos.active'); 
	Route::post('periodos/{id}/inactive', 'PeriodosController@inactive')->name('periodos.inactive')->middleware('permiso:periodos.inactive');


/*
|--------------------------------------------------------------------------
| Periodos
|--------------------------------------------------------------------------
|
*/
	Route::get('elementos', 'ElementosController@index')->name('elementos.index')->middleware('permiso:elementos.index'); 
	Route::get('elementos/create', 'ElementosController@create')->name('elementos.create')->middleware('permiso:elementos.create'); 
	Route::post('elementos/store', 'ElementosController@store')->name('elementos.store')->middleware('permiso:elementos.store'); 
	Route::get('elementos/{id}/edit', 'ElementosController@edit')->name('elementos.edit')->middleware('permiso:elementos.edit'); 
	Route::post('elementos/{id}/edit', 'ElementosController@update')->name('elementos.update')->middleware('permiso:elementos.update'); 
	Route::post('elementos/{id}/delete', 'ElementosController@destroy')->name('elementos.destroy')->middleware('permiso:elementos.destroy'); 
	Route::post('elementos/{id}/active', 'ElementosController@active')->name('elementos.active')->middleware('permiso:elementos.active'); 
	Route::post('elementos/{id}/inactive', 'ElementosController@inactive')->name('elementos.inactive')->middleware('permiso:elementos.inactive');


/*
|--------------------------------------------------------------------------
| Periodos
|--------------------------------------------------------------------------
|
*/
	Route::get('valores', 'ValoresConjuntosController@index')->name('valores.index')->middleware('permiso:valores.index'); 
	Route::get('valores/create', 'ValoresConjuntosController@create')->name('valores.create')->middleware('permiso:valores.create'); 
	Route::post('valores/store', 'ValoresConjuntosController@store')->name('valores.store')->middleware('permiso:valores.store'); 
	Route::get('valores/{id}/edit', 'ValoresConjuntosController@edit')->name('valores.edit')->middleware('permiso:valores.edit'); 
	Route::post('valores/{id}/edit', 'ValoresConjuntosController@update')->name('valores.update')->middleware('permiso:valores.update'); 
	Route::post('valores/{id}/delete', 'ValoresConjuntosController@destroy')->name('valores.destroy')->middleware('permiso:valores.destroy'); 
	Route::post('valores/{id}/active', 'ValoresConjuntosController@active')->name('valores.active')->middleware('permiso:valores.active'); 
	Route::post('valores/{id}/inactive', 'ValoresConjuntosController@inactive')->name('valores.inactive')->middleware('permiso:valores.inactive');
	Route::get('valores/ver', 'ValoresConjuntosController@show')->name('valores.show')->middleware('permiso:valores.show'); 



});






