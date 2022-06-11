<?php

namespace App\Http\Controllers;

use App\Models\Reporte;


class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::with('cliente:id,nombre')->orderBy('id', 'desc')->get();
        return view('reporte.index', compact('reportes'));
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

    //Eliminar uno
    public function deleteThis(Reporte $reporte)
    {
        $reporte->delete();
        return back();
    }
}
