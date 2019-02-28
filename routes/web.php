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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace'=>'Catalogos','middleware'=>'auth'],function(){
	Route::resource('empresa','EmpresaController');
	Route::resource('contacto','ContactoController');	
});

Route::get('/enviar-notificacion',function(){
	$user=App\User::findOrFail(3);
	$user->notify((new App\Notifications\NewContacto($user))->onQueue('contactos'));
	return "Enviado";
});



Route::get('/enviar-email',function(){
	//throw new Exception('prueba');
	Mail::to('sistemas@andeantc.net')
	->cc('ernesto.liberio@gmail.com')
	->queue(new App\Mail\RegistroContacto())
	 ;
	return "Enviado";
});


Route::get('/asigna',function(){
	$user=App\User::findOrFail(3);
	$user->assign('admin');
	
	return "Enviado";
});


