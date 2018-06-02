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

/**
 * Rutas Proveedores
 */
Route::get('proveedores/index', [
	'uses' => 'ProveedoresController@index',
	'middleware' => 'auth',
	'as' => 'proveedores.index'
]);

Route::get('proveedores/create', [
	'uses' => 'ProveedoresController@create',
	'middleware' => 'auth',
	'as' => 'proveedores.create'
]);

Route::post('proveedores/store', [
	'uses' => 'ProveedoresController@store',
	'middleware' => 'auth',
	'as' => 'proveedores.store'
]);

Route::get('proveedores/show', [
	'uses' => 'ProveedoresController@show',
	'middleware' => 'auth',
	'as' => 'proveedores.show'
]);

Route::get('proveedores/destroy', [
	'uses' => 'ProveedoresController@destroy',
	'middleware' => 'auth',
	'as' => 'proveedores.destroy'
]);
