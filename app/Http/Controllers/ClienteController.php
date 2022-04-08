<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Reporte;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Mail\Bienvenido;
use Illuminate\Support\Facades\Mail;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportes = Reporte::all();
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes', 'reportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {  
        //GUARDAR DATOS PROVENIENTES DEL FORM 
        Cliente::create($request->all());

        $cliente = new Cliente($request->all());

        //Mail::to($request->email)->send(new Bienvenido($cliente));
        return redirect()->route('cliente.index')->with('status', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
        //return view('caja.create', compact('cliente', $cliente));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente', $cliente));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        //
        $cliente->update($request->all());
        return redirect()->route('cliente.index')->with('status', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
        $cliente->delete();
        return redirect()->route('cliente.index')->with('status', 'eliminado');
    }
}
