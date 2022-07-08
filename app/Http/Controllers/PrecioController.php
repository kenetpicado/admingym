<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use App\Http\Requests\UpdatePrecioRequest;

class PrecioController extends Controller
{
    //Mostrar lista de precios
    public function index()
    {
        $precios = Precio::all();
        return view ('precio.index', compact('precios'));
    }

    //Editar un precio
    public function edit(Precio $precio)
    {
        return view('precio.edit', compact('precio'));
    }

    //Actualizar un precio
    public function update(UpdatePrecioRequest $request, Precio $precio)
    {
        $precio->update($request->all());
        return redirect()->route('precios.index')->with('info', config('app.update'));
    }
}
