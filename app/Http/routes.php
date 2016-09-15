<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'HomeController@index');
Route::get('ErrorPermisos', function(){
	return view('errors.errorpermisos');
});
  
Route::get('/contra/{contra}',function($contra){
	return bcrypt($contra);
});
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/user',function(){
	return Auth::user()->persona->nombre;
});
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

Route::resource('Vehiculo','VehiculoController');
Route::resource('tipoVehiculo','TipoVehiculoController');

Route::resource('Marca','MarcasController');

Route::resource('Cliente','ClienteController');

Route::resource('Vendedor','VendedorController');

Route::resource('Servicios','ServiciosController');

});