<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    //Ver todos los Clientes
    public function index()
    {
        $clientes = Cliente::index();
        return view('cliente.index', compact('clientes'));
    }

    //Guardar un Cliente
    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()->route('planes.create', $cliente->id);
    }

    //Ver pesos de un cliente
    public function show($cliente_id)
    {
        $pesos = DB::table('pesos')->where('cliente_id', $cliente_id)->get();
        return view('cliente.show', compact('pesos', 'cliente_id'));
    }

    //Editar un cliente
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    //Actualizar cliente
    public function update(StoreClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('info', config('app.update'));
    }

    public function search(Request $request)
    {
        $clientes = DB::table('clientes')
            ->where('id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('nombre', 'LIKE', '%' . $request->search . '%')
            ->select([
                'id',
                'nombre',
                'sexo',
                DB::raw('(select count(*) from planes where clientes.id = planes.cliente_id) as planes_count')
            ])
            ->paginate(20);

        return view('cliente.index', compact('clientes'));
    }
}
