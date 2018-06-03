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
