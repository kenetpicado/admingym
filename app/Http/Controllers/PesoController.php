<?php

namespace App\Http\Controllers;

use App\Models\Peso;
use App\Http\Requests\StorePesoRequest;

class PesoController extends Controller
{

    public function store(StorePesoRequest $request)
    {
        Peso::create($request->all());
        return redirect()->route('clientes.show', $request->cliente_id)->with('status', 'ok');
    }
}
