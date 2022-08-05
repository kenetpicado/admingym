@extends('layout')

@section('title', 'Agregar ingreso')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('ingresos.index') }}">Ingresos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
@endsection

@section('contenido')
    <div class="card">

        <x-header-0>Agregar</x-header-0>

        <x-create-form ruta='ingresos.store'>
            <x-input-list name='concepto' list="ingresos-categorias"></x-input-list>
            <x-input name='descripcion' text="Descripción"></x-input>
            <x-input name='monto'></x-input>
            <x-input name='created_at' type='date' label="Fecha" :val="date('Y-m-d')"></x-input>
            <x-cat-ingresos></x-cat-ingresos>
        </x-create-form>
    </div>
@endsection
