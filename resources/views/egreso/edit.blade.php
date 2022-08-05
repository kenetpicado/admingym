@extends('layout')

@section('title', 'Editar egreso')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('egresos.index') }}">Egresos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('contenido')
    <div class="card">

        <x-header-0>Editar</x-header-0>

        <x-edit-form ruta='egresos.update' :id="$egreso->id">
            <x-input-list name='concepto' list="egresos-categorias" :val="$egreso->concepto"></x-input-list>
            <x-input name='descripcion' text="Descripción" :val="$egreso->descripcion"></x-input>
            <x-input name='monto' :val="$egreso->monto"></x-input>
            <x-input name='created_at' :val="$egreso->created_at" type='date' label="Fecha" :val="date('Y-m-d')"></x-input>
            <x-cat-egresos></x-cat-egresos>
        </x-edit-form>
    </div>
@endsection
