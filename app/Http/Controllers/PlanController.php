<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Precio;
use App\Models\Cliente;
use App\Models\Ingreso;
use App\Models\Reporte;
use App\Models\Registro;
use App\Http\Requests\StoreCajaRequest;

class PlanController extends Controller
{
    public function index()
    {
        $registro = Registro::getToday();

        if ($registro == null)
            $registro = Plan::deleteExpired();

        $reportes = Reporte::getReportes();
        $planes = Plan::getPlanes();
        return view('plan.index', compact('planes', 'reportes', 'registro'));
    }

    //Pagar plan de cliente
    public function create($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);
        return view('plan.create', compact('cliente'));
    }

    //Guardar plan
    public function store(StoreCajaRequest $request)
    {
        Reporte::deleteByUser($request->cliente_id);

        $precio = Precio::getPrice($request->servicio, $request->plan);

        if ($precio == 'none')
            return redirect()->route('clientes.index')->with('info', config('app.noprice'));

        //Aplicar descuento si hay beca
        if ($request->beca > 0)
            $precio = $precio - $request->beca;

        $request->merge([
            'fecha_fin' => $this->get_end($request->plan, $request->created_at),
            'monto' => $precio,
        ]);

        Plan::create($request->all());
        Ingreso::create($request->all());

        return redirect()->route('clientes.index')->with('info', config('app.add'));
    }

    //Editar un plan
    public function edit($plan_id)
    {
        $plan = Plan::find($plan_id);
        return view('plan.edit', compact('plan'));
    }

    //Actualizar plan
    public function update(StoreCajaRequest $request, $plan_id)
    {
        $precio = Precio::getPrice($request->servicio, $request->plan);

        if ($precio == 'none')
            return redirect()->route('planes.index')->with('error',  config('app.noprice'));

        //Aplicar descuento si hay beca
        if ($request->beca > 0) {
            $precio = $precio - $request->beca;
        }

        $request->merge([
            'fecha_fin' => $this->get_end($request->plan, $request->created_at),
            'monto' => $precio,
        ]);

        $plan = Plan::find($plan_id);

        $ingreso = Ingreso::where('nombre', $plan->cliente->nombre)
            ->where('servicio', $plan->servicio)
            ->where('created_at', $plan->created_at)
            ->first();

        $plan->update($request->all());
        $ingreso->update($request->all());

        return redirect()->route('planes.index')->with('info', config('app.update'));
    }

    public function get_end($value, $fecha)
    {
        $date =  Carbon::create($fecha);

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
