@extends('layout')

@section('title', 'Editar entrenador')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('entrenador.index') }}">Entrenadores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Editar</x-header-0>

        <x-edit-form ruta='entrenador.update' :id="$entrenador->id">
            <x-input name='nombre' :val="$entrenador->nombre"></x-input>
            <x-input name='telefono' :val="$entrenador->telefono"></x-input>
            <x-input name='horario' :val="$entrenador->horario"></x-input>
        </x-edit-form>
    </div>
    </div>
@endsection
