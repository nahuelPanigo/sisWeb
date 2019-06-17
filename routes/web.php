<?php

Route::get('/inicio',function(){
	return view('indexIngenieria');
});

Route::get('/',function(){
	return view('index');
});
Route::get('logout','Auth\LoginController@logout');

Route::get('/propiedades/search', 'PropiedadController@search');

Route::get('/propiedades/listar', 'PropiedadController@indexAdmin');

Route::get('/solicitudes/listar', 'UserController@index');

Route::get('/enviarSolicitud/{id}' , 'AdministratorUserController@solicitudes');

 Route::resource('pujas','PujaController');
 Route::get('/subastas/participar', 'PujaController@create');

route::resource('propiedades','PropiedadController');
Route::get('/propiedades/{id}/delete',      ['uses' => 'PropiedadController@delete',     'as' => 'admin.propiedades.delete']);

route::resource('subastas','SubastaController');
Route::get('/subastas/{id}/create',      ['uses' => 'SubastaController@create',     'as' => 'categorias.subastas.create']);

route::resource('reservas','ReservaController');

Route::group(['prefix'=>'admin'],function() {
	Route::resource('users','UserController');
	Route::resource('propiedades','PropiedadController');
	Route::resource('sesion','sesionController');

});



