@extends('layout')

@section('title', 'Editar ingreso')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ingresos.index') }}">Ingresos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <x-header-0 text='Editar'></x-header-0>

            {{-- FORM EDIT --}}
            <x-edit-form ruta='ingresos.update' :id="$ingreso->id">
                <div class="row">
                    <x-input-list label='nombre' text="Concepto" :val="$ingreso->nombre" class="col-lg-6"
                        list="ingresos-categorias"></x-input-list>
                </div>
                <div class="row">
                    <x-input-form label='servicio' text="Descripción" :val="$ingreso->servicio" class="col-lg-6"></x-input-form>
                </div>
                <div class="row">
                    <x-input-form label='monto' :val="$ingreso->monto" class="col-lg-3"></x-input-form>
                    <x-input-form label='created_at' type='date' text="Fecha" :val="$ingreso->created_at" class="col-lg-3">
                    </x-input-form>
                </div>
            </x-edit-form>
            <x-cat-ingresos></x-cat-ingresos>
        </div>
    </div>
@endsection
