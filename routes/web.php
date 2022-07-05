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
    return view('welcome');
});

//AQUI SE ENRUTAN TODAS LAS VISTAS
Route::view('productos','tablaProductos');
Route::view('formulario','formAddProd');
Route::view('master','layaout.master');
Route::view('dashborad', 'layaout.master2');
Route::view('prueba','prueba');
Route::view('barcode','layaout.barcode');
Route::view('ventas','ventas');


//AQUI SE ENRUTAN LAS APIS
Route::apiResource('apiProductos','ProductoController');
Route::apiResource('apiVentas','VentaController');

