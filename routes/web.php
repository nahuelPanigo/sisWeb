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


Route::group(['prefix'=>'categorias'],function() {
	Route::resource('subastas','SubastaController');
	Route::resource('hotsales','HotsaleController');
});
 
 Route::get('/subastas/participar', 'PujaController@create');



Route::group(['prefix'=>'admin'],function() {
	Route::resource('users','UserController');
	Route::resource('propiedades','PropiedadController');
	Route::resource('sesion','sesionController');

});



