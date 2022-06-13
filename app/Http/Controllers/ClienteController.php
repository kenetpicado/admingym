<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
        $clientes = Cliente::withCount('planes')->get();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()->route('planes.create', $cliente->id)->with('info', config('app.add'));
    }

    public function show($cliente_id)
    {
        $cliente = Cliente::find($cliente_id, ['id', 'nombre']);
        return view('cliente.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('info', config('app.update'));
    }
}
