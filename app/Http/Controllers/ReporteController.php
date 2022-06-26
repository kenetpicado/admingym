<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Reporte;


class ReporteController extends Controller
{
    //Mostrar todas las notificaciones
    public function index()
    {
        $inspected = Plan::deleteExpired();
        $reportes = Reporte::orderDesc();
        return view('reporte.index', compact('reportes', 'inspected'));
    }

    //Eliminar una notificacion
    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
        return back()->with('info', config('app.deleted'));
    }
}
