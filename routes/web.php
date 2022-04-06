<?php

use App\Http\Controllers\CajaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\IngresoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

//RUTAS EXTRAS
Route::delete('delete',  [ReporteController::class, 'delete'])->name('reporte.delete');
Route::get('pagar/{cliente}', [CajaController::class, 'pagar'])->name('pagar');
Route::post('consulta', [IngresoController::class, 'consulta'])->name('consulta');

Route::resource('cliente', ClienteController::class);
Route::resource('caja', CajaController::class);
Route::resource('entrenador', EntrenadorController::class);
Route::resource('evento', EventoController::class);
Route::resource('reporte', ReporteController::class);
Route::resource('reporte', ReporteController::class);
Route::resource('ingreso', IngresoController::class);

Auth::routes();
