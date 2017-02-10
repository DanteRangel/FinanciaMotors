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
Route::resource('Ventas','VentasController');
Route::get('/home', 'HomeController@index');
Route::get('/user',function(){
	return Auth::user()->persona->nombre;
});
Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

Route::resource('Vehiculo','VehiculoController');
Route::resource('tipoVehiculo','TipoVehiculoController');

Route::resource('Marca','MarcasController');

Route::resource('Cliente','ClienteController');
Route::resource('Empresa','EmpresaController');
Route::resource('Vendedor','VendedorController');

Route::resource('Servicios','ServiciosController');

Route::resource('Servicios_for_Vehiculo','Servicios_VehiculoController');

Route::post('Cliente/selectEmpresa','ClienteController@selectEmpresa');

Route::post('Cliente/formContado','ClienteController@formContado');
Route::any('Servicios_for_Vehiculo/{id}/setServicios','Servicios_VehiculoController@setServicios');

});

Route::group(['prefix'=>'Prospeccion','middleware'=>'admin'],function(){
	Route::get('create','ProspeccionController@create');
	Route::get('getOptionCliente','ProspeccionController@getOptionCliente');
	Route::post('primera_etapa','ProspeccionController@primera_etapa_guardar');
	Route::get('get/{id}','ProspeccionController@getProspeccion');
	Route::get('dashboard','ProspeccionController@dashboard');
	Route::post('update','ProspeccionController@update');
});

Route::group(['prefix'=>'mail'],function(){
	Route::any('send/seguimientos/day','MailController@send');
});