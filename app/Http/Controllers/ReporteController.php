<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Reporte;

class ReporteController extends Controller
{
    //Mostrar todas las notificaciones
    public function index()
    {
        $registro = Registro::getToday();
        $reportes = Reporte::getReportes();
        return view('reporte.index', compact('reportes', 'registro'));
    }

    //Eliminar una notificacion
    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
        return back()->with('info', config('app.deleted'));
    }
}
