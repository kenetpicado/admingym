<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\PesoController;
use App\Http\Controllers\PrecioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


//REPORTES
Route::delete('reporte',  [ReporteController::class, 'delete'])->name('reporte.delete');
Route::get('reporte/{reporte}',  [ReporteController::class, 'deleteThis'])->name('reporte.destroy');
Route::get('reportes',  [ReporteController::class, 'index'])->name('reportes.index');

//PLANES
Route::get('planes/{cliente}/create', [PlanController::class, 'create'])->name('planes.create');


//Consulta personalizada
//Route::post('ingreso/consulta', [IngresoController::class, 'consulta'])->name('consulta');
//Route::post('egreso/consulta', [EgresoController::class, 'consulta'])->name('egreso.consulta');

//PESOS
Route::resource('pesos', PesoController::class)->only(['store', 'edit', 'update']);

Route::get('egreso/{value}/ver', [EgresoController::class, 'ver'])->name('egreso.ver');
Route::get('egreso/todos', [EgresoController::class, 'all'])->name('egreso.all');

Route::resource('clientes', ClienteController::class);
Route::resource('entrenador', EntrenadorController::class);
Route::resource('evento', EventoController::class);
Route::resource('ingresos', IngresoController::class);
Route::resource('egresos', EgresoController::class);
Route::resource('precios', PrecioController::class);
Route::resource('/', HomeController::class);

Route::resource('planes', PlanController::class)
    ->except(['create']);

Auth::routes();
