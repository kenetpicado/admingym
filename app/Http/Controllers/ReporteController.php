<?php

namespace App\Http\Controllers;

use App\Models\Reporte;


class ReporteController extends Controller
{
    public function delete() {
        Reporte::destroy(Reporte::all());
        return redirect()->route('index')->with('status', 'eliminado');
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
    }
}
