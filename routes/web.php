<?php

use App\Http\Controllers\ClienteController;
use App\Models\Caja;
use App\Models\Cliente;
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

Route::get('/', function () {
    $cant = Cliente::all()->count();
    $cant2 = Caja::all()->count();
    $ganancias = 0;

    $caja = Caja::all();

    foreach ($caja as $item) {
        $ganancias = $ganancias + $item->monto;
    }
    return view('index', compact('cant', 'ganancias', 'cant2', $cant, $ganancias, $cant2));
})->middleware('auth');

//RUTAS EXTRAS
Route::get('reportes/delete', 'ReporteController@delete')->name('reportes.delete');

//RECURSOS DE RUTAS PREDEFINIDAS
Route::resource('clientes', 'ClienteController');
Route::resource('caja', 'CajaController');
Route::resource('reportes', 'ReporteController');
Route::resource('entrenador', 'EntrenadorController');
Route::resource('evento', 'EventoController');

//RUTA PARA VER LOS CLIENTES ACTIVOS
Route::get('actives', 'CajaController@actives')->name('actives');

//RUTAAS QUE PROVEE EL SERVICIO DE AUTENTICACION
Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
