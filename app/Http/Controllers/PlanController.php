<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Precio;
use App\Models\Registro;
use App\Http\Requests\StoreCajaRequest;
use App\Services\my_services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index()
    {
        $registro = Registro::getToday();

        if (!$registro)
            $registro = Plan::deleteExpired();

        $planes = Plan::index();
        return view('plan.index', compact('planes', 'registro'));
    }

    public function search(Request $request)
    {
        $planes = Plan::join('clientes', 'planes.cliente_id', '=', 'clientes.id')
            ->orderBy('fecha_fin')
            ->where('clientes.id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('clientes.nombre', 'LIKE', '%' . $request->search . '%')
            ->select([
                'planes.id',
                'clientes.nombre as cliente_nombre',
                'created_at',
                'fecha_fin',
                'nota',
                'servicio'
            ])
            ->paginate(20);

        return view('plan.index', compact('planes'));
    }

    //Pagar plan de cliente
    public function create($cliente_id)
    {
        $servicios = (new my_services)->servicios();
        $planes = (new my_services)->planes();
        return view('plan.create', compact('cliente_id', 'servicios', 'planes'));
    }

    //Guardar plan
    public function store(StoreCajaRequest $request)
    {
        $precio = Precio::getPrice($request->servicio, $request->plan);

        if (!$precio)
            return redirect()->route('clientes.index')->with('info', config('app.noprice'));

        $request->merge([
            'fecha_fin' => (new my_services)->get_end($request->plan, $request->created_at),
            'monto' => $precio->monto - $request->beca,
        ]);

        Plan::create($request->all());
        return redirect()->route('clientes.index')->with('info', config('app.add'));
    }

    //Ver detalles de un plan
    public function show($plan_id)
    {
        $plan = Plan::show($plan_id);
        return view('plan.show', compact('plan'));
    }

    //Editar un plan
    public function edit(Plan $plan)
    {
        $servicios = (new my_services)->servicios();
        $planes = (new my_services)->planes();
        return view('plan.edit', compact('plan', 'servicios', 'planes'));
    }

    //Actualizar plan
    public function update(StoreCajaRequest $request, Plan $plan)
    {
        $precio = Precio::getPrice($request->servicio, $request->plan);

        if (!$precio)
            return redirect()->route('planes.index')->with('info',  config('app.noprice'));

        $request->merge([
            'fecha_fin' => (new my_services)->get_end($request->plan, $request->created_at),
            'monto' => $precio->monto - $request->beca,
        ]);

        $plan->update($request->all());
        return redirect()->route('planes.index')->with('info', config('app.update'));
    }
}
