@extends('layout')

@section('title', 'Editar plan')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('planes.index') }}">Planes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card mb-4">
            <x-header-0 text='Editar'></x-header-0>

            <!-- FORM EDIT -->
            <x-edit-form ruta="planes.update" :id="$plan->id">
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label>Servicio</label>
                        <select name="servicio" class="form-control" required>
                            <x-option val="PESAS" ctl="servicio" :old="$plan->servicio"></x-option>
                            <x-option val="ZUMBA" ctl="servicio" :old="$plan->servicio"></x-option>
                            <x-option val="SPINNING" ctl="servicio" :old="$plan->servicio"></x-option>
                            <x-option val="ZUMBA+PESAS" ctl="servicio" :old="$plan->servicio"></x-option>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Plan</label>
                        <select name="plan" class="form-control" required>
                            <x-option val="MENSUAL" ctl="plan" :old="$plan->plan"></x-option>
                            <x-option val="QUINCENAL" ctl="plan" :old="$plan->plan"></x-option>
                            <x-option val="SEMANAL" ctl="plan" :old="$plan->plan"></x-option>
                            <x-option val="DIA" ctl="plan" :old="$plan->plan"></x-option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <x-input-form label='beca' class="col-lg-3" type='number' :val="$plan->beca"></x-input-form>
                    <x-input-form label='created_at' class="col-lg-3" type='date' :val="$plan->created_at" text="Inicia">
                    </x-input-form>
                </div>

                <div class="row">
                    <x-input-form label='nota' class="col-lg-6" :val="$plan->nota"></x-input-form>
                </div>
            </x-edit-form>
        </div>
    </div>
@endsection
