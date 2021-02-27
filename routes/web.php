<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'HomeController@index')->name('home');

	//Rutas de Usuario
	Route::resource('usuario', 'UsuarioController');
	Route::get('listado_usuario', 'UsuarioController@getusuario');
	//Buscador de usuario
	Route::get('buscador', 'UsuarioController@buscador')->name('buscador');	

	//Rutas de email
	Route::resource('email', 'TodoController');
	Route::get('listado_email', 'TodoController@getemail');


	//cargar estados
	Route::get('estados/{id}', 'UsuarioController@getestados')->name('estados');	
	//cargar ciudades
	Route::get('ciudad/{id}', 'UsuarioController@getciudad')->name('ciudad');	
	

});

