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
Route::get('composicionhilo/index', [
	'uses' => 'ComposicionHiloController@index',
	'middleware' => 'auth',
	'as' => 'composicionhilo.index'
]);

Route::get('composicionhilo/create', [
	'uses' => 'ComposicionHiloController@create',
	'middleware' => 'auth',
	'as' => 'composicionhilo.create'
]);

Route::post('composicionhilo/store', [
	'uses' => 'ComposicionHiloController@store',
	'middleware' => 'auth',
	'as' => 'composicionhilo.store'
]);

Route::get('composicionhilo/show/{id}', [
	'uses' => 'ComposicionHiloController@show',
	'middleware' => 'auth',
	'as' => 'composicionhilo.show'
]);

Route::get('composicionhilo/destroy/{id}', [
	'uses' => 'ComposicionHiloController@destroy',
	'middleware' => 'auth',
	'as' => 'composicionhilo.destroy'
]);

Route::get('composicionhilo/update/{id}', [
	'uses' => 'ComposicionHiloController@update',
	'middleware' => 'auth',
	'as' => 'composicionhilo.update'
]);

Route::post('composicionhilo/edit/{id}', [
	'uses' => 'ComposicionHiloController@edit',
	'middleware' => 'auth',
	'as' => 'composicionhilo.edit'
]);

Route::post('composicionhilo/createPorcentaje/{id}', [
	'uses' => 'ComposicionHiloController@createPorcentaje',
	'middleware' => 'auth',
	'as' => 'composicionhilo.createPorcentaje'
]);

Route::get('composicionhilo/destroyporcentaje/{id}', [
	'uses' => 'ComposicionHiloController@destroyPorcentaje',
	'middleware' => 'auth',
	'as' => 'composicionhilo.destroyPorcentaje'
]);

/**
 * Rutas Texturas
 */
Route::get('texturas/index', [
	'uses' => 'TexturasController@index',
	'middleware' => 'auth',
	'as' => 'texturas.index'
]);

Route::get('texturas/create', [
	'uses' => 'TexturasController@create',
	'middleware' => 'auth',
	'as' => 'texturas.create'
]);

Route::post('texturas/store', [
	'uses' => 'TexturasController@store',
	'middleware' => 'auth',
	'as' => 'texturas.store'
]);

Route::get('texturas/show/{id}', [
	'uses' => 'TexturasController@show',
	'middleware' => 'auth',
	'as' => 'texturas.show'
]);

Route::get('texturas/destroy/{id}', [
	'uses' => 'TexturasController@destroy',
	'middleware' => 'auth',
	'as' => 'texturas.destroy'
]);

Route::get('texturas/update/{id}', [
	'uses' => 'TexturasController@update',
	'middleware' => 'auth',
	'as' => 'texturas.update'
]);

Route::post('texturas/edit/{id}', [
	'uses' => 'TexturasController@edit',
	'middleware' => 'auth',
	'as' => 'texturas.edit'
]);

/**
 * Rutas Claves Hilos
 */
Route::get('claveshilos/index', [
	'uses' => 'ClavesHilosController@index',
	'middleware' => 'auth',
	'as' => 'claveshilos.index'
]);

Route::get('claveshilos/create', [
	'uses' => 'ClavesHilosController@create',
	'middleware' => 'auth',
	'as' => 'claveshilos.create'
]);

Route::post('claveshilos/store', [
	'uses' => 'ClavesHilosController@store',
	'middleware' => 'auth',
	'as' => 'claveshilos.store'
]);

Route::get('claveshilos/show/{id}', [
	'uses' => 'ClavesHilosController@show',
	'middleware' => 'auth',
	'as' => 'claveshilos.show'
]);

Route::get('claveshilos/destroy/{id}', [
	'uses' => 'ClavesHilosController@destroy',
	'middleware' => 'auth',
	'as' => 'claveshilos.destroy'
]);

Route::get('claveshilos/update/{id}', [
	'uses' => 'ClavesHilosController@update',
	'middleware' => 'auth',
	'as' => 'claveshilos.update'
]);

Route::post('claveshilos/edit/{id}', [
	'uses' => 'ClavesHilosController@edit',
	'middleware' => 'auth',
	'as' => 'claveshilos.edit'
]);

/**
 * Rutas Tejidos
 */
Route::get('tejidos/index', [
	'uses' => 'TejidosController@index',
	'middleware' => 'auth',
	'as' => 'tejidos.index'
]);

Route::get('tejidos/create', [
	'uses' => 'TejidosController@create',
	'middleware' => 'auth',
	'as' => 'tejidos.create'
]);

Route::post('tejidos/store', [
	'uses' => 'TejidosController@store',
	'middleware' => 'auth',
	'as' => 'tejidos.store'
]);

Route::get('tejidos/show/{id}', [
	'uses' => 'TejidosController@show',
	'middleware' => 'auth',
	'as' => 'tejidos.show'
]);

Route::get('tejidos/destroy/{id}', [
	'uses' => 'TejidosController@destroy',
	'middleware' => 'auth',
	'as' => 'tejidos.destroy'
]);

Route::get('tejidos/update/{id}', [
	'uses' => 'TejidosController@update',
	'middleware' => 'auth',
	'as' => 'tejidos.update'
]);

Route::post('tejidos/edit/{id}', [
	'uses' => 'TejidosController@edit',
	'middleware' => 'auth',
	'as' => 'tejidos.edit'
]);

/**
 * Rutas Telas Clientes
 */
Route::get('telascliente/index', [
	'uses' => 'TelasClienteController@index',
	'middleware' => 'auth',
	'as' => 'telascliente.index'
]);

Route::get('telascliente/create', [
	'uses' => 'TelasClienteController@create',
	'middleware' => 'auth',
	'as' => 'telascliente.create'
]);

Route::post('telascliente/store', [
	'uses' => 'TelasClienteController@store',
	'middleware' => 'auth',
	'as' => 'telascliente.store'
]);

Route::get('telascliente/show/{id}', [
	'uses' => 'TelasClienteController@show',
	'middleware' => 'auth',
	'as' => 'telascliente.show'
]);

Route::get('telascliente/destroy/{id}', [
	'uses' => 'TelasClienteController@destroy',
	'middleware' => 'auth',
	'as' => 'telascliente.destroy'
]);

Route::get('telascliente/update/{id}', [
	'uses' => 'TelasClienteController@update',
	'middleware' => 'auth',
	'as' => 'telascliente.update'
]);

Route::post('telascliente/edit/{id}', [
	'uses' => 'TelasClienteController@edit',
	'middleware' => 'auth',
	'as' => 'telascliente.edit'
]);

/**
 * Rutas Máquinas Circulares
 */
Route::get('maquinascirculares/index', [
	'uses' => 'MaquinasCircularesController@index',
	'middleware' => 'auth',
	'as' => 'maquinascirculares.index'
]);

Route::get('maquinascirculares/create', [
	'uses' => 'MaquinasCircularesController@create',
	'middleware' => 'auth',
	'as' => 'maquinascirculares.create'
]);

Route::post('maquinascirculares/store', [
	'uses' => 'MaquinasCircularesController@store',
	'middleware' => 'auth',
	'as' => 'maquinascirculares.store'
]);

Route::get('maquinascirculares/show/{id}', [
	'uses' => 'MaquinasCircularesController@show',
	'middleware' => 'auth',
	'as' => 'maquinascirculares.show'
]);

Route::get('maquinascirculares/destroy/{id}', [
	'uses' => 'MaquinasCircularesController@destroy',
	'middleware' => 'auth',
	'as' => 'maquinascirculares.destroy'
]);

Route::get('maquinascirculares/update/{id}', [
	'uses' => 'MaquinasCircularesController@update',
	'middleware' => 'auth',
	'as' => 'maquinascirculares.update'
]);

Route::post('maquinascirculares/edit/{id}', [
	'uses' => 'MaquinasCircularesController@edit',
	'middleware' => 'auth',
	'as' => 'maquinascirculares.edit'
]);

/**
 * Rutas Crudos
 */
Route::get('crudos/index', [
	'uses' => 'CrudosController@index',
	'middleware' => 'auth',
	'as' => 'crudos.index'
]);

Route::get('crudos/create', [
	'uses' => 'CrudosController@create',
	'middleware' => 'auth',
	'as' => 'crudos.create'
]);

Route::post('crudos/store', [
	'uses' => 'CrudosController@store',
	'middleware' => 'auth',
	'as' => 'crudos.store'
]);

Route::get('crudos/show/{id}', [
	'uses' => 'CrudosController@show',
	'middleware' => 'auth',
	'as' => 'crudos.show'
]);

Route::get('crudos/destroy/{id}', [
	'uses' => 'CrudosController@destroy',
	'middleware' => 'auth',
	'as' => 'crudos.destroy'
]);

Route::get('crudos/update/{id}', [
	'uses' => 'CrudosController@update',
	'middleware' => 'auth',
	'as' => 'crudos.update'
]);

Route::post('crudos/edit/{id}', [
	'uses' => 'CrudosController@edit',
	'middleware' => 'auth',
	'as' => 'crudos.edit'
]);

Route::post('crudos/datos', [
	'uses' => 'CrudosController@datos',
	'middleware' => 'auth',
	'as' => 'crudos.datos'
]);

/**
 * Rutas Facturas
 */
Route::get('facturas/index', [
	'uses' => 'FacturasController@index',
	'middleware' => 'auth',
	'as' => 'facturas.index'
]);

Route::get('facturas/create', [
	'uses' => 'FacturasController@create',
	'middleware' => 'auth',
	'as' => 'facturas.create'
]);

Route::post('facturas/store', [
	'uses' => 'FacturasController@store',
	'middleware' => 'auth',
	'as' => 'facturas.store'
]);

Route::get('facturas/show/{id}', [
	'uses' => 'FacturasController@show',
	'middleware' => 'auth',
	'as' => 'facturas.show'
]);

Route::get('facturas/destroy/{id}', [
	'uses' => 'FacturasController@destroy',
	'middleware' => 'auth',
	'as' => 'facturas.destroy'
]);

Route::get('facturas/update/{id}', [
	'uses' => 'FacturasController@update',
	'middleware' => 'auth',
	'as' => 'facturas.update'
]);

Route::post('facturas/edit/{id}', [
	'uses' => 'FacturasController@edit',
	'middleware' => 'auth',
	'as' => 'facturas.edit'
]);

Route::post('proveedores/datos', [
	'uses' => 'ProveedoresController@datos',
	'middleware' => 'auth',
	'as' => 'proveedores.datos'
]);