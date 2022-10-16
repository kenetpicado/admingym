<?php

namespace App\Http\Controllers;
namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::middleware(['auth'])->group(function () {

    Route::get('/', Home::class)->name('index');

    Route::get('planes', Planes::class)->name('planes');

    Route::get('clientes', Clientes::class)->name('clientes');

    Route::get('precios', Precios::class)->name('precios');

    Route::get('pesos/{cliente_id}', Pesos::class)->name('pesos');

    Route::get('personal', Personal::class)->name('personal');

    Route::get('eventos/{persona_id}', Eventos::class)->name('eventos');

    Route::get('reportes',  Reportes::class)->name('reportes');

    Route::get('contabilidad',  Contabilidad::class)->name('contabilidad');

    Route::resource('user', UserController::class);
    Route::put('password/{id}', [UserController::class, 'password'])->name('password');
});

Auth::routes(['register' => false]);
