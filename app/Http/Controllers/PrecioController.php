<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrecioRequest;
use App\Http\Requests\UpdatePrecioRequest;
use App\Models\Precio;

class PrecioController extends Controller
{
    public function index()
    {
        $precios = Precio::all();
        return view ('precio.index', compact('precios'));
    }

    public function edit(Precio $precio)
    {
        return view('precio.edit', compact('precio'));
    }

    public function update(UpdatePrecioRequest $request, Precio $precio)
    {
        $precio->update($request->all());
        return redirect()->route('precios.index')->with('info', config('app.update'));
    }
}
