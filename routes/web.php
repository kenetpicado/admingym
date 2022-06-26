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


Route::middleware(['auth'])->group(function () {
    Route::resource('pesos', PesoController::class)->only(['store', 'edit', 'update']);
    Route::resource('reportes',  ReporteController::class)->only(['index', 'destroy']);
    Route::resource('clientes', ClienteController::class)->except(['destroy']);
    Route::resource('entrenador', EntrenadorController::class)->except(['create', 'destroy']);
    Route::resource('precios', PrecioController::class)->only(['index', 'edit', 'update']);
    Route::resource('eventos', EventoController::class)->only(['store']);
    Route::resource('ingresos', IngresoController::class)->except(['create', 'show', 'destroy']);
    Route::resource('egresos', EgresoController::class)->except(['create', 'show', 'destroy']);
    Route::resource('/', HomeController::class);
    Route::get('planes/{cliente}/create', [PlanController::class, 'create'])->name('planes.create');
    Route::resource('planes', PlanController::class)->except(['create']);

    //INGRESOS
    Route::view('rango/ingresos', 'ingreso.rango')->name('ingresos.rango');
    Route::view('categorias/ingresos', 'ingreso.categorias')->name('ingresos.categorias');

    Route::post('rango/ingresos', [IngresoController::class, 'get_rango'])->name('ingresos.getrango');
    Route::post('categorias/ingresos', [IngresoController::class, 'get_categorias'])->name('ingresos.getcategorias');

    //EGRESOS
    Route::view('rango/egresos', 'egreso.rango')->name('egresos.rango');
    Route::view('categorias/egresos', 'egreso.categorias')->name('egresos.categorias');

    Route::post('rango/egresos', [EgresoController::class, 'get_rango'])->name('egresos.getrango');
    Route::post('categorias/egresos', [EgresoController::class, 'get_categorias'])->name('egresos.getcategorias');
});

Auth::routes(['register' => false]);
