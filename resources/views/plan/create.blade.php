@extends('layout')

@section('title', 'Pagar')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pagar</li>
            </ol>
        </nav>

        <x-info></x-info>

        <!-- FORM STORE -->
        <x-create-form ruta="planes.store" title='Pagar'>

            <div class="row">
                <div class="form-group col-lg-3">
                    <label>Servicio</label>
                    <select name="servicio" class="form-control" autofocus>
                        <x-option val="PESAS" ctl="servicio"></x-option>
                        <x-option val="ZUMBA" ctl="servicio"></x-option>
                        <x-option val="SPINNING" ctl="servicio"></x-option>
                        <x-option val="ZUMBA+PESAS" ctl="servicio"></x-option>
                    </select>
                </div>

                <div class="form-group col-lg-3">
                    <label>Plan</label>
                    <select name="plan" class="form-control">
                        <x-option val="MENSUAL" ctl="plan"></x-option>
                        <x-option val="QUINCENAL" ctl="plan"></x-option>
                        <x-option val="SEMANAL" ctl="plan"></x-option>
                        <x-option val="DIA" ctl="plan"></x-option>
                    </select>
                </div>
            </div>

            <div class="row">
                <x-input-form label='beca' class="col-lg-3" type='number' val="0"></x-input-form>
                <x-input-form label='created_at' class="col-lg-3" type='date' :val="date('Y-m-d')" text="Inicia"></x-input-form>
            </div>

            <div class="row">
                <x-input-form label='nota' class="col-lg-6"></x-input-form>
            </div>
            
            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
            <input type="hidden" name="nombre" value="{{ $cliente->nombre }}">
             <input type="hidden" name="email" value="{{ $cliente->email }}">
        </x-create-form>
    </div>
@endsection
