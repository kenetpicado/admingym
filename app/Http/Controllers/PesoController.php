<?php

namespace App\Http\Controllers;

use App\Models\Peso;
use App\Http\Requests\StorePesoRequest;

class PesoController extends Controller
{

    public function store(StorePesoRequest $request)
    {
        Peso::create($request->all());
        return redirect()->route('clientes.show', $request->cliente_id)->with('info', config('app.add'));
    }

    public function edit(Peso $peso)
    {
        return view('peso.edit', compact('peso'));
    }

    public function update(StorePesoRequest $request, Peso $peso)
    {
        $peso->update($request->all());
        return redirect()->route('clientes.show', $peso->cliente_id)->with('info', config('app.update'));
    }
}
