@extends('layout')

@section('title', 'Agregar entrenador')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('entrenador.index') }}">Entrenadores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
@endsection

@section('contenido')
    <div class="card">

        <x-header-0>Agregar</x-header-0>

        <x-create-form ruta='entrenador.store'>
            <x-input name='nombre'></x-input>
            <x-input name='telefono'></x-input>
            <x-input name='horario'></x-input>
        </x-create-form>
    </div>
@endsection
