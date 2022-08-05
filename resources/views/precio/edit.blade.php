@extends('layout')

@section('title', 'Editar precio')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('precios.index') }}">Precios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>{{ $precio->servicio }} - {{ $precio->plan }}</x-header-0>

        <x-edit-form ruta="precios.update" :id="$precio->id">
            <x-input name='monto' type='number' :val="$precio->monto"></x-input>
        </x-edit-form>
    </div>
    </div>
@endsection
