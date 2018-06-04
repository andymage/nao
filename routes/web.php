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

Route::get('proveedores/show/{id}', [
	'uses' => 'ProveedoresController@show',
	'middleware' => 'auth',
	'as' => 'proveedores.show'
]);

Route::get('proveedores/destroy/{id}', [
	'uses' => 'ProveedoresController@destroy',
	'middleware' => 'auth',
	'as' => 'proveedores.destroy'
]);

Route::get('proveedores/update/{id}', [
	'uses' => 'ProveedoresController@update',
	'middleware' => 'auth',
	'as' => 'proveedores.update'
]);

Route::post('proveedores/edit/{id}', [
	'uses' => 'ProveedoresController@edit',
	'middleware' => 'auth',
	'as' => 'proveedores.edit'
]);

/**
 * Rutas Clientes
 */
Route::get('clientes/index', [
	'uses' => 'ClientesController@index',
	'middleware' => 'auth',
	'as' => 'clientes.index'
]);

Route::get('clientes/create', [
	'uses' => 'ClientesController@create',
	'middleware' => 'auth',
	'as' => 'clientes.create'
]);

Route::post('clientes/store', [
	'uses' => 'ClientesController@store',
	'middleware' => 'auth',
	'as' => 'clientes.store'
]);

Route::get('clientes/show/{id}', [
	'uses' => 'ClientesController@show',
	'middleware' => 'auth',
	'as' => 'clientes.show'
]);

Route::get('clientes/destroy/{id}', [
	'uses' => 'ClientesController@destroy',
	'middleware' => 'auth',
	'as' => 'clientes.destroy'
]);

Route::get('clientes/update/{id}', [
	'uses' => 'ClientesController@update',
	'middleware' => 'auth',
	'as' => 'clientes.update'
]);

Route::post('clientes/edit/{id}', [
	'uses' => 'ClientesController@edit',
	'middleware' => 'auth',
	'as' => 'clientes.edit'
]);

/**
 * Rutas Materiales
 */
Route::get('materiales/index', [
	'uses' => 'MaterialesController@index',
	'middleware' => 'auth',
	'as' => 'materiales.index'
]);

Route::get('materiales/create', [
	'uses' => 'MaterialesController@create',
	'middleware' => 'auth',
	'as' => 'materiales.create'
]);

Route::post('materiales/store', [
	'uses' => 'MaterialesController@store',
	'middleware' => 'auth',
	'as' => 'materiales.store'
]);

Route::get('materiales/show/{id}', [
	'uses' => 'MaterialesController@show',
	'middleware' => 'auth',
	'as' => 'materiales.show'
]);

Route::get('materiales/destroy/{id}', [
	'uses' => 'MaterialesController@destroy',
	'middleware' => 'auth',
	'as' => 'materiales.destroy'
]);

Route::get('materiales/update/{id}', [
	'uses' => 'MaterialesController@update',
	'middleware' => 'auth',
	'as' => 'materiales.update'
]);

Route::post('materiales/edit/{id}', [
	'uses' => 'MaterialesController@edit',
	'middleware' => 'auth',
	'as' => 'materiales.edit'
]);


/**
 * Rutas Hilos
 */
Route::get('hilos/index', [
	'uses' => 'HilosController@index',
	'middleware' => 'auth',
	'as' => 'hilos.index'
]);

Route::get('hilos/create', [
	'uses' => 'HilosController@create',
	'middleware' => 'auth',
	'as' => 'hilos.create'
]);

Route::post('hilos/store', [
	'uses' => 'HilosController@store',
	'middleware' => 'auth',
	'as' => 'hilos.store'
]);

Route::get('hilos/show/{id}', [
	'uses' => 'HilosController@show',
	'middleware' => 'auth',
	'as' => 'hilos.show'
]);

Route::get('hilos/destroy/{id}', [
	'uses' => 'HilosController@destroy',
	'middleware' => 'auth',
	'as' => 'hilos.destroy'
]);

Route::get('hilos/update/{id}', [
	'uses' => 'HilosController@update',
	'middleware' => 'auth',
	'as' => 'hilos.update'
]);

Route::post('hilos/edit/{id}', [
	'uses' => 'HilosController@edit',
	'middleware' => 'auth',
	'as' => 'hilos.edit'
]);

/**
 * Rutas Composicion Hilo
 */
Route::post('hilos/composicion/{id_hilo}', [
	'uses' => 'HilosController@createComposicion',
	'middleware' => 'auth',
]);
