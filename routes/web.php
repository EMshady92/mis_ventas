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
    return view('layouts.principal');
});

Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Controllers\Auth\LoginController@logout']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('productos_all', App\Http\Controllers\ProductosController::class);
Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'productos'])->name('productos');


Route::get('/comprar/{id}', [App\Http\Controllers\ProductosController::class, 'comprar'])->name('comprar');

Route::get('/compras', [App\Http\Controllers\ComprasController::class, 'compras'])->name('compras');

Route::get('/facturar/{id}', [App\Http\Controllers\FacturasController::class, 'facturar'])->name('facturar');
Route::get('/ver_factura/{id}', [App\Http\Controllers\FacturasController::class, 'ver_factura'])->name('ver_factura');
