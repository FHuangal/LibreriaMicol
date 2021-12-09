<?php

use Illuminate\Support\Facades\Route;

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
    return view('sesion.inicio');
});
Route::post('/','UserController@login')->name('user.login');

Route::get('/offline', function()
{
	return view('vendor/laravelpwa/offline');
});



Route::resource('categorias','CategoryController')->names('categories');
Route::resource('clientes','ClienteController')->names('clientes');
Route::resource('productos','ProductoController')->names('productos');
Route::resource('proveedores','ProveedorController')->names('proveedors');
Route::resource('compras','CompraController')->names('compras');
Route::resource('ventas','VentaController')->names('ventas');

Route::get('/inicio', function () {
    return view('index');
});

Route::get('/registro', function () {
    return view('sesion.registro');
});







