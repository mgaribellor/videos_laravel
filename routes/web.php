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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
	return view('adminlte::auth.login');
});


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


//Rutas de controlador de video
Route::get('/Crear-video', array(
		'as'=>'createVideo',
		'middleware'=>'auth',
		'uses'=>'VideoController@createVideo'	
));


Route::post('/guardar-video', array(
		'as'=>'saveVideo',
		'middleware'=>'auth',
		'uses'=>'VideoController@saveVideo'	
));