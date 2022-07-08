<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    //Ver todos los Clientes
    public function index()
    {
        $clientes = Cliente::getClientes();
        return view('cliente.index', compact('clientes'));
    }

    //Guardar un Cliente
    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()->route('planes.create', $cliente->id);
    }

    //Ver pesos de un cliente
    public function show(Cliente $cliente)
    {
        return view('cliente.show', compact('cliente'));
    }

    //Editar un cliente
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    //Actualizar cliente
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('info', config('app.update'));
    }
}
