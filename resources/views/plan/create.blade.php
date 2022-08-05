@extends('layout')

@section('title', 'Crear plan')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('planes.index') }}">Planes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear plan</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Crear plan</x-header-0>

        <x-create-form ruta="planes.store">
            <x-select-0 name="servicio" :items="$servicios"></x-select-0>
            <x-select-0 name="plan" :items="$planes"></x-select-0>
            <x-input name='beca' type='number' val="0"></x-input>
            <x-input name='created_at' type='date' :val="date('Y-m-d')" label="Inicia"></x-input>
            <x-input name='nota'></x-input>
            <input type="hidden" name="cliente_id" value="{{ $cliente_id }}">
        </x-create-form>
    </div>
@endsection
