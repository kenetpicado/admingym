@extends('layout')

@section('title', 'Agregar peso')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
    <li class="breadcrumb-item"><a href="{{ route('clientes.show', $cliente_id) }}">Pesos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Agregar</x-header-0>

        <x-create-form ruta='pesos.store'>
            <x-input name='peso' label='Peso en libras'></x-input>
            <x-input name='created_at' type="date" label='Fecha de registro' :val="date('Y-m-d')"></x-input>
            <input type="hidden" name="cliente_id" value="{{ $cliente_id }}">
        </x-create-form>
    </div>
@endsection
