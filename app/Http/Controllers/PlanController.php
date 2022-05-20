<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Cliente;
use App\Http\Requests\StoreCajaRequest;
use App\Mail\Pago;
use App\Models\Ingreso;
use App\Models\Reporte;
use Illuminate\Support\Facades\Mail;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $planes = Plan::deleteExpired();
        $reportes = Reporte::all();
        return view('plan.index', compact('planes', 'reportes'));
    }

    public function create($cliente_id)
    {
        $cliente = Cliente::getData($cliente_id);
        return view('plan.create', compact('cliente'));
    }

    public function store(StoreCajaRequest $request)
    {
        Reporte::deleteByUser($request->cliente_id);

        $request->merge([
            'fecha_fin' => $this->get_month($request->plan)
        ]);

        //Aplicar descuento si hay beca
        if ($request->beca > 0) {
            $request->merge([
                'monto' => $request->monto - ($request->monto * $request->beca / 100)
            ]);
        }

        $caja = Plan::create($request->all());
        Ingreso::create($request->all());

        Mail::to($request->email)->send(new Pago($caja));

        return redirect()->route('clientes.index')->with('status', 'ok');
    }

    public function get_month($value)
    {
        $today = date('Y-m-d');

        switch ($value) {
            case 'MENSUAL':
                return date('Y-m-d', strtotime($today . ' + 1 month'));
                break;
            case 'QUINCENAL':
                return date('Y-m-d', strtotime($today . ' + 15 days'));
                break;
            case 'SEMANAL':
                return date('Y-m-d', strtotime($today . ' + 7 days'));
                break;
            case 'DIA':
                return date('Y-m-d', strtotime($today . ' + 1 days'));
                break;
        }
    }
}
