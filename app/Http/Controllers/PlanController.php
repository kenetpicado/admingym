<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Cliente;
use App\Http\Requests\StoreCajaRequest;
use App\Mail\Pago;
use App\Models\Ingreso;
use App\Models\Precio;
use App\Models\Reporte;
use Carbon\Carbon;
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

        $precio = Precio::getPrice($request->servicio, $request->plan);

        if ($precio == 'none')
            return redirect()->route('clientes.index')->with('status', 'noprice');

        if ($request->created_at != '') {
            $start = $request->created_at;
            $end = $request->fecha_fin;
        } else {
            $start = Carbon::now()->format('Y-m-d');
            $end = $this->get_end($request->plan);
        }

        //Aplicar descuento si hay beca
        if ($request->beca > 0) {
            $precio = $precio - $request->beca;
        }

        $request->merge([
            'created_at' => $start,
            'fecha_fin' => $end,
            'monto' => $precio,
        ]);

        $plan = Plan::create($request->all());
        Ingreso::create($request->all());

        // if ($request->email != "") {
        //     Mail::to($request->email)->send(new Pago($plan));
        // }

        return redirect()->route('clientes.index')->with('status', 'ok');
    }

    public function get_end($value)
    {
        $date = Carbon::now();

        switch ($value) {
            case 'MENSUAL':
                $new = $date->addMonth(1)->format('Y-m-d');
                break;
            case 'QUINCENAL':
                $new = $date->addDays(15)->format('Y-m-d');
                break;
            case 'SEMANAL':
                $new = $date->addDays(7)->format('Y-m-d');
                break;
            case 'DIA':
                $new = $date->addDay()->format('Y-m-d');
                break;
        }
        return $new;
    }
}
