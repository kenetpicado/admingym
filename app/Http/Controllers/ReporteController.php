<?php

namespace App\Http\Controllers;

use App\Models\Reporte;


class ReporteController extends Controller
{
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
