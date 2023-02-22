<?php

namespace App\Http\Controllers;

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {

    Route::get('/', Home::class)->name('index');

    Route::get('planes', Planes::class)->name('planes');

    Route::get('reportes', Reportes::class)->name('reportes');

    Route::get('perfil', Perfil::class)->name('perfil');
});

Route::middleware(['auth', 'role:administrador|root'])->group(function () {

    Route::get('clientes', Clientes::class)->name('clientes');

    Route::get('precios', Precios::class)->name('precios');

    Route::get('pesos/{cliente}', Pesos::class)->name('pesos');

    Route::get('personal', Personal::class)->name('personal');

    Route::get('eventos/{entrenador}', Eventos::class)->name('eventos');

    Route::get('contabilidad', Contabilidad::class)->name('contabilidad'); //TODO

    Route::get('historial/{cliente}', Historial::class)->name('historial');

    Route::get('estadisticas', Estadisticas::class)->name('estadisticas');

    Route::get('users', Users::class)->name('users');
});

Auth::routes(['register' => false]);
