@extends('layout')

@section('title', 'Pagar')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('precios.index') }}">Precios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card mb-4">
            <x-header-0 :text="$precio->servicio . ' - ' . $precio->plan"></x-header-0>

            <!-- FORM EDIT -->
            <x-edit-form ruta="precios.update" :id="$precio->id">
                <div class="row">
                    <x-input-form label='monto' class="col-lg-6" type='number' :val="$precio->monto"></x-input-form>
                </div>
            </x-edit-form>
        </div>
    </div>
@endsection
