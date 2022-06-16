@extends('layout')

@section('title', 'Editar entrenador')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('entrenador.index') }}">Entrenadores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card mb-4">
            <x-header-0 text='Editar'></x-header-0>

            {{-- FORM EDIT --}}
            <x-edit-form ruta='entrenador.update' :id="$entrenador->id">
                <div class="row">
                    <x-input-form label='nombre' :val="$entrenador->nombre" class="col-lg-6"></x-input-form>
                </div>
                <div class="row">
                    <x-input-form label='telefono' :val="$entrenador->telefono" class="col-lg-6"></x-input-form>
                </div>
                <div class="row">
                    <x-input-form label='horario' :val="$entrenador->horario" class="col-lg-6"></x-input-form>
                </div>
            </x-edit-form>
        </div>
    </div>
@endsection
