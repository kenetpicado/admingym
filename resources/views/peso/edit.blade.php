@extends('layout')

@section('title', 'Editar peso')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.show', $peso->cliente_id) }}">Pesos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <x-header-0 text='Editar'></x-header-0>

            {{-- FORM EDIT --}}
            <x-edit-form ruta='pesos.update' :id="$peso->id">
                <div class="row">
                    <x-input-form label='peso' text='Peso (lb)' class="col-lg-6" :val="$peso->peso"></x-input-form>
                </div>
            </x-edit-form>
        </div>
    </div>
@endsection
