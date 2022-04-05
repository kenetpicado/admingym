<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Cliente;
use App\Http\Requests\StoreCajaRequest;
use App\Http\Requests\UpdateCajaRequest;
use App\Models\Reporte;

class CajaController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // OBTENGO TODOS LOS ACTIVOS
        $cajas = Caja::all();
        
        foreach ($cajas as $caja) {
            //SI LA FECHA ACTUAL ES MAYOR O IGUAL
            //A LA FECHA DE FIN: ELIMINA
            if (date('Y-m-d') >= $caja->fecha_fin) {
                Reporte::create([
                    'mensaje' =>  $caja->cliente->nombre,
                    'cliente_id' =>  $caja->cliente_id
                ]);

                CajaController::destroy($caja);
            }
        }

        $reportes = Reporte::all();

        //PLANES ACTIVOS
        $cajas = Caja::all();
        return view('caja.index', compact('cajas'))->with('reportes', $reportes);
    }

    public function pagar(Cliente $cliente)
    {
        return view('caja.create', compact('cliente', $cliente));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCajaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCajaRequest $request)
    {
        //Reporte::destroy(Reporte::where('cliente_id', '=', $request->cliente_id)->get());
        
        //OBTENER FECHA DE HOY
        $today = date('Y-m-d');

        //CALCULAR FECHA SIGUIENTE SEGUN EL PLAN
        switch ($request->plan) {
            case 'MENSUAL':
                $end = date('Y-m-d', strtotime($today . ' + 1 month'));
                break;
            case 'QUINCENAL':
                $end = date('Y-m-d', strtotime($today . ' + 15 days'));
                break;
            case 'SEMANAL':
                $end = date('Y-m-d', strtotime($today . ' + 7 days'));
                break;
            case 'DIA':
                $end = date('Y-m-d', strtotime($today . ' + 1 days'));
                break;
        }

        //Agregar fecha de fin
        $request->merge([
            'fecha_fin' => $end
        ]);

        //GUARDAR DATOS
        Caja::create($request->all());

        return redirect()->route('cliente.index')->with('status', 'ok' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function show(Caja $caja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function edit(Caja $caja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCajaRequest  $request
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCajaRequest $request, Caja $caja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caja $caja)
    {
        //
        $caja->delete();
    }
}
