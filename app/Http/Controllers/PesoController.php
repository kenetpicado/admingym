<?php

namespace App\Http\Controllers;

use App\Models\Peso;
use App\Http\Requests\StorePesoRequest;
use App\Http\Requests\UpdatePesoRequest;

class PesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePesoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesoRequest $request)
    {
        //
        Peso::create($request->all());
        return redirect()->route('cliente.show', $request->cliente_id)->with('status', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function show(Peso $peso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function edit(Peso $peso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesoRequest  $request
     * @param  \App\Models\Peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesoRequest $request, Peso $peso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peso $peso)
    {
        //
    }
}
