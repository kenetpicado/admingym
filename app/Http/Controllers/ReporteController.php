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

    //Eliminar todos
    public function delete()
    {
        Reporte::destroy(Reporte::all());
        return redirect()->route('index');
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
    }

    //Eliminar una notificacion
    public function deleteThis(Reporte $reporte)
    {
        $reporte->delete();
        return back()->with('error', config('app.deleted'));
    }
}
