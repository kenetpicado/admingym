@extends('layout')

@section('title', 'Agregar egreso')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('egresos.index') }}">Egresos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
@endsection

@section('contenido')
    <div class="card">

        <x-header-0>Agregar</x-header-0>

        <x-create-form ruta='egresos.store'>
            <x-input-list name='concepto' list="egresos-categorias"></x-input-list>
            <x-input name='descripcion' text="Descripción"></x-input>
            <x-input name='monto'></x-input>
            <x-input name='created_at' type='date' label="Fecha" :val="date('Y-m-d')"></x-input>
            <x-cat-egresos></x-cat-egresos>
        </x-create-form>
    </div>
@endsection
