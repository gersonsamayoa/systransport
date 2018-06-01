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

Route::get('/', function () {
    return view('index');
});
/*Rutas para manejo de usuarios*/
Route::group(['prefix'=>'admin'], function() {
		Route::resource('usuarios', 'UsersController');
		Route::get('usuarios/{id}/destroy', [
		'uses'	=>'UsersController@destroy',
		'as' 	=>'admin.usuarios.destroy'
		]);

	});
/*Rutas para gestion de maquinaria*/
Route::group(['prefix'=>'admin','middleware' => 'auth'], function() {
		Route::resource('maquinaria', 'MaquinariaController');
		Route::get('maquinaria/{id}/destroy', [
		'uses'	=>'MaquinariaController@destroy',
		'as' 	=>'admin.maquinaria.destroy'
		]);

		Route::resource('transaccion', 'TransaccionController');
		Route::get('transaccion/{id}/destroy', [
		'uses'	=>'TransaccionController@destroy',
		'as' 	=>'admin.transaccion.destroy'
		]);
	});
			/*Rutas para inicio de sesion*/
			Route::get('admin/auth/login',[
				'uses' 	=> 'Auth\AuthController@getLogin',
				'as'	=>	'admin.auth.login'
				]);

			Route::post('admin/auth/login',[
				'uses' 	=> 'Auth\AuthController@postLogin',
				'as'	=>	'admin.auth.login'
				]);


			Route::get('admin/auth/logout',[
				'uses' 	=> 'Auth\AuthController@getLogout',
				'as'	=>	'admin.auth.logout'
				]);
			/*Rutas para envio de correo de contacto*/
			Route::get('admin/auth/contacto',['as'=>'admin.auth.contacto', function(){
				 return view('admin.auth.contacto');
			}]);

			Route::resource('mail', 'MailController');