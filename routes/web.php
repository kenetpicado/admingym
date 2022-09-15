<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::middleware(['auth'])->group(function () {

    Route::post('clientes', [ClienteController::class, 'search'])
        ->name('clientes.search');

    Route::resource('pesos', PesoController::class)->only(['store', 'edit', 'update']);
    Route::resource('reportes',  ReporteController::class)->only(['index', 'destroy']);

    Route::resource('clientes', ClienteController::class)
        ->except(['destroy', 'store', 'create']);

    Route::post('save/clientes', [ClienteController::class, 'store'])
        ->name('clientes.store');

    Route::resource('entrenador', EntrenadorController::class)
        ->except(['destroy', 'create']);

    Route::resource('precios', PrecioController::class)->only(['index', 'edit', 'update']);
    Route::resource('eventos', EventoController::class)->only(['store']);

    Route::resource('ingresos', IngresoController::class)
        ->except(['show', 'destroy', 'create']);

    Route::resource('egresos', EgresoController::class)
        ->except(['show', 'destroy', 'create']);

    Route::resource('/', HomeController::class);
    Route::get('planes/{cliente}/create', [PlanController::class, 'create'])->name('planes.create');
    Route::resource('planes', PlanController::class)->except(['create'])->parameters(['planes' => 'plan']);
    Route::resource('user', UserController::class);

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
    Route::put('password/{id}', [UserController::class, 'password'])->name('password');
});

Auth::routes(['register' => false]);

// Route::get('mantenimiento', function () {
//     $egresos = Ingreso::all();

//     // $este = Ingreso::find(12)->concepto;
//     // return utf8_decode(strtolower($este));
//     // return ($este);

//     foreach ($egresos as $key => $egreso) {
//         try {
//             $egreso->update([
//                 'concepto' => utf8_decode(strtolower($egreso->concepto)),
//                 'descripcion' => utf8_decode(strtolower($egreso->descripcion)),
//             ]);
//         } catch (Exception $e) {
//             return dd($egreso);
//         }
//     }
// });
