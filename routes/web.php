<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
Route::group(['prefix' => 'api'], function()
{
    //Proveedores
    Route::get('proveedor', 'ProveedorController@index');
    Route::get('proveedor/{id}', 'ProveedorController@show');
    Route::post('proveedor', 'ProveedorController@store');
    Route::put('proveedor/{id}','ProveedorController@update');
    //tiposproducto
    Route::get('tipoproducto', 'TipoProductoController@index');
    Route::get('tipoproducto/{id}', 'TipoProductoController@show');
    Route::post('tipoproducto', 'TipoProductoController@store');
    Route::put('tipoproducto/{id}','TipoProductoController@update');
    //Productos
    Route::get('producto', 'ProductoController@index');
    Route::get('producto/{id}', 'ProductoController@show');
    Route::post('producto', 'ProductoController@store');
    Route::put('producto/{id}','ProductoController@update');
});
