<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrecioRequest;
use App\Http\Requests\UpdatePrecioRequest;
use App\Models\Precio;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $precios = Precio::all();
        return view ('precio.index', compact('precios'));
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
     * @param  \App\Http\Requests\StorePrecioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrecioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function show(Precio $precio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function edit(Precio $precio)
    {
        return view('precio.edit', compact('precio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrecioRequest  $request
     * @param  \App\Models\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrecioRequest $request, Precio $precio)
    {
        //
        $precio->update($request->all());
        return redirect()->route('precios.index')->with('info', config('app.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Precio $precio)
    {
        //
    }
}
