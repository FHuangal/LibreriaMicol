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

/*Route::get('/home', function () {
    return view('home');
});*/





Route::get('/', function () {
    return view('auth.login');
});


Route::get('/offline', function()
{
	return view('vendor/laravelpwa/offline');
});

Route::get('/getUnegocio','VentaController@getUnegocio')->name('getUnegocio');
Route::get('/zzZ','VentaController@zzZ')->name('zzZ');

Route::get('sunat/{id}', 'VentaController@sunat')->name('venta.sunat');
Route::get('/ayuda', 'ReportController@ayuda')->name('ayuda');

Route::get('/almacen', 'ReportController@almacen')->name('almacen.report');

Route::get('/venta_fecha', 'ReportController@venta_fecha')->name('ventas.fecha');
Route::post('/venta_resultados', 'ReportController@venta_resultados')->name('ventas.resultados');

Route::get('/compra_fecha', 'ReportController@compra_fecha')->name('compras.fecha');
Route::post('/compra_resultados', 'ReportController@compra_resultados')->name('compras.resultados');

Route::post('/ventapdf', 'ReportController@generarvPDF')->name('ventas.pdf');
Route::post('/comprapdf', 'ReportController@generarcPDF')->name('compras.pdf');
Route::get('/almacenpdf', 'ReportController@almacenPDF')->name('almacen.pdf');

Route::get('/voucher/{id}', 'VentaController@voucher')->name("venta.voucher");
Route::resource('usuarios','UserController')->names('users');
Route::resource('categorias','CategoryController')->names('categories');
Route::resource('clientes','ClienteController')->names('clientes');
Route::resource('productos','ProductoController')->names('productos');
Route::resource('proveedores','ProveedorController')->names('proveedors');
Route::resource('compras','CompraController')->names('compras');
Route::resource('ventas','VentaController')->names('ventas');

Route::get('/buscarDni', 'ClienteController@buscarDni')->name('buscarDni');
Route::get('/buscarRuc', 'ClienteController@buscarRuc')->name('buscarRuc');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');