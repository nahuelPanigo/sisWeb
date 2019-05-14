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





Route::get('/',function(){
	return view('indexIngenieria');
});
*/

Route::get('/',function(){
	return view('indexIngenieria');
});

Route::get('registrarUnaPropiedad',function(){
	return view('registrarUnaPropiedad');
});

Route::get('registrarUsuario',function(){
	return view('registrarUsuario');
});

Route::get('modificarPropiedad',function(){
	return view('ModificarPropiedad');
});
Route::get('iniciarSesion',function(){
	return view('IniciarSesion');
});

