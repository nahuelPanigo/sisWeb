<?php

Route::get('/inicio',function(){
	return view('indexIngenieria');
});

Route::get('/',function(){
	return view('index');
});
Route::get('logout','Auth\LoginController@logout');

Route::get('/propiedades/search', 'PropiedadController@search');

/*Cosas de administrador*/
Route::get('/propiedades/listar', 'PropiedadController@indexAdmin');
Route::get('/subastas/listar', 'SubastaController@indexAdmin');
Route::resource('administrador', 'AdministratorUserController');
Route::get('/sesion/adminLogout', 'Auth\LoginController@adminLogOut');
Route::get('administrator/logIn','sesionController@indexAdmin');
/* fin de cosas de administrador*/

Route::resource('pujas','PujaController');
Route::get('/subastas/participar', 'PujaController@create');
Route::get('/enviarSolicitud/{id}' , 'AdministratorUserController@solicitudes');
Route::get('/solicitudes/listar' , 'AdministratorUserController@listarSolicitudes');
Route::get('/indexAdmin' , 'AdministratorUserController@index');
Route::get('/aceptarSolicitud/{user}' , 'AdministratorUserController@aceptarSolicitud');
Route::get('/rechazarSolicitud/{user}' , 'AdministratorUserController@rechazarSolicitud');


 Route::resource('pujas','PujaController');
 Route::get('/subastas/participar', 'PujaController@create');

route::resource('propiedades','PropiedadController');
Route::get('/propiedades/{id}/delete',      ['uses' => 'PropiedadController@delete',     'as' => 'admin.propiedades.delete']);


/* rutas de subastas*/

route::resource('subastas','SubastaController');
Route::get('/subastas/{id}/create',      ['uses' => 'SubastaController@create',     'as' => 'categorias.subastas.create']);
Route::post('/subastas/finalizar', 'SubastaController@finalizarSubasta');
/* fin de rutas de subastas*/

route::resource('reservas','ReservaController');

Route::group(['prefix'=>'admin'],function() {
	Route::resource('users','UserController');
	Route::resource('propiedades','PropiedadController');
	Route::resource('sesion','sesionController');
});


