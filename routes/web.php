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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


//BORRA TODOS LOS REPORTES
Route::delete('reporte/delete',  [ReporteController::class, 'delete'])->name('reporte.delete');

//PLANES
Route::get('planes', [PlanController::class, 'index'])->name('planes.index');
Route::get('planes/{cliente}/create', [PlanController::class, 'create'])->name('planes.create');
Route::post('planes', [PlanController::class, 'store'])->name('planes.store');

//Consulta personalizada
Route::post('ingreso/consulta', [IngresoController::class, 'consulta'])->name('consulta');
Route::post('egreso/consulta', [EgresoController::class, 'consulta'])->name('egreso.consulta');

//PESOS
Route::post('peso', [PesoController::class, 'store'])->name('peso.store');

Route::get('egreso/{value}/ver', [EgresoController::class, 'ver'])->name('egreso.ver');

Route::resource('clientes', ClienteController::class);
Route::resource('entrenador', EntrenadorController::class);
Route::resource('evento', EventoController::class);
Route::resource('ingreso', IngresoController::class);
Route::resource('egresos', EgresoController::class);
Route::resource('/', HomeController::class);

Auth::routes();
