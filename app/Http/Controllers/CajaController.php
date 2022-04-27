<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Cliente;
use App\Http\Requests\StoreCajaRequest;
use App\Http\Requests\UpdateCajaRequest;
use App\Mail\Pago;
use App\Models\Ingreso;
use App\Models\Reporte;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isEmpty;

class CajaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //OBTENGO TODOS LOS ACTIVOS
        $cajas = Caja::with('cliente:id,nombre')
        ->get(['id', 'fecha_fin', 'cliente_id']);

        foreach ($cajas as $caja) {

            if (date('Y-m-d') >= $caja->fecha_fin) 
            {
                Reporte::create([
                    'mensaje' =>  $caja->cliente->nombre,
                    'cliente_id' =>  $caja->cliente_id
                ]);
                $caja->delete();
            }
        }

        $reportes = Reporte::all();

        //PLANES ACTIVOS
        $cajas = Caja::with('cliente:id,nombre')
        ->get(['id', 'beca', 'servicio', 'nota', 'created_at', 'fecha_fin', 'cliente_id']);

        return view('caja.index', compact('cajas', 'reportes'));
    }

    public function pagar(Cliente $cliente)
    {
        return view('caja.create', compact('cliente'));
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
        //SI UN CLIENTE TIENE REPORTE BORRAR
        if (Reporte::where('cliente_id', '=', $request->cliente_id)->get()->count() > 0) {
            Reporte::destroy(Reporte::where('cliente_id', $request->cliente_id)->get());
        }

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

        $beca = 0;
        
        if($request->beca > 0)
        {
            $beca = $request->monto * $request->beca / 100;
            $nuevo_monto = $request->monto - $beca;

            $request->merge([
                'monto' => $nuevo_monto
            ]);
        }
        
        //GUARDAR DATOS
        Caja::create($request->all());

        //Guardar ingreso
        Ingreso::create([
            'monto' => $request->monto,
            'nombre' => $request->nombre,
            'servicio' => $request->servicio,
            'beca' => $beca
        ]);

        //$correo = Cliente::find($request->cliente_id)->email;
        //Mail::to($correo)->send(new Pago($caja));

        return redirect()->route('cliente.index')->with('status', 'ok');
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
    public function destroy($caja_id)
    {
        //
    }
}
