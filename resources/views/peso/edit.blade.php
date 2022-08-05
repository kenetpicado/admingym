@extends('layout')

@section('title', 'Editar peso')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
    <li class="breadcrumb-item"><a href="{{ route('clientes.show', $peso->cliente_id) }}">Pesos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('contenido')
    <div class="card">
            <x-header-0>Editar</x-header-0>

            <x-edit-form ruta='pesos.update' :id="$peso->id">
                <x-input name='peso' label='Peso en libras' :val="$peso->peso"></x-input>
                <x-input name='created_at' type="date" label='Fecha de registro' :val="date('Y-m-d')"></x-input>
            </x-edit-form>
        </div>
    </div>
@endsection
