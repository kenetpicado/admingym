@extends('layout')

@section('title', 'Pesos')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pesos</li>
            </ol>
        </nav>

        <x-info></x-info>

        <div class="card mb-4">
            <x-header-1 modelo="Pesos"></x-header-1>

            {{-- FORM STORE --}}
            <x-modal-add ruta='pesos.store' title='Peso'>
                <x-input-form label='peso' text='Peso (lb)'></x-input-form>
                <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
            </x-modal-add>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>Peso (libras)</th>
                    <th>Fecha registro</th>
                    <th>Editar</th>
                </x-slot>
                <tbody>
                    @foreach ($cliente->pesos as $peso)
                        <tr>
                            <td>{{ $peso->peso }}</td>
                            <td>{{ $peso->created_at }}</td>
                            <td>
                                <a href="{{ route('pesos.edit', $peso->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table-head>
        </div>
    </div>
@endsection
<x-open-modal></x-open-modal>
