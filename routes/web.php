<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PlatillosController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PagosController;
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleados.index');
Route::delete('/empleados/{empleado}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('empleados.destroy');
Route::resource('categorias', CategoriaController::class);
Route::resource('platillos', PlatillosController::class);

Route::resource('ordenes', OrdersController::class);
Route::get('/pagos/create/{orden}', [PagosController::class, 'create'])->name('pagos.create');
Route::resource('pagos', PagosController::class);

// Rutas para terminar o cancelar una orden
Route::put('/orden/{orden}/terminar', [OrdersController::class, 'terminar'])->name('orden.terminar');
Route::put('/orden/{orden}/cancelar', [OrdersController::class, 'cancelar'])->name('orden.cancelar');

// Ruta para agregar un platillo a una orden
Route::post('/ordenes/agregar', [OrdersController::class, 'agregar'])->name('ordenes.agregar');
