@extends('layout')

@section('title', 'Editar ingreso')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('ingresos.index') }}">Ingresos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('contenido')
    <div class="card">

        <x-header-0>Editar</x-header-0>

        <x-edit-form ruta='ingresos.update' :id="$ingreso->id">
            <x-input-list name='concepto' list="ingresos-categorias" :val="$ingreso->concepto"></x-input-list>
            <x-input name='descripcion' text="Descripción" :val="$ingreso->descripcion"></x-input>
            <x-input name='monto' :val="$ingreso->monto"></x-input>
            <x-input name='created_at' :val="$ingreso->created_at" type='date' label="Fecha" :val="date('Y-m-d')"></x-input>
            <x-cat-ingresos></x-cat-ingresos>
        </x-edit-form>
    </div>
@endsection
