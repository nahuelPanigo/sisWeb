<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|




*/

Route::get('/inicio',function(){
	return view('indexIngenieria');
});

Route::get('/',function(){
	return view('index');
});
 
Route::get('/propiedades/search', 'PropiedadController@search');

Route::group(['prefix'=>'categorias'],function() {
	Route::resource('subastas','SubastaController');
	Route::resource('hotsales','HotsaleController');
});
 
 Route::get('/subastas/participar', 'PujaController@create');

Route::put('/propiedades/{propiedad}',      ['as' => 'propiedad.update2',     'uses' => 'PropiedadController@update2'   ]);

route::resource('propiedades','PropiedadController');
Route::get('/propiedades/{id}/delete',      ['uses' => 'PropiedadController@delete',     'as' => 'admin.propiedades.delete'   ]);

Route::group(['prefix'=>'admin'],function() {
	Route::resource('users','UserController');
	Route::resource('propiedades','PropiedadController');
	Route::resource('sesion','sesionController');

});



