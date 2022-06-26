@extends('layout')

@section('title', 'Clientes')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>

        <x-info></x-info>

        <div class="card mb-4">

            <x-header-1 modelo="Clientes"></x-header-1>

            {{-- FORM STORE --}}
            <x-modal-add ruta='clientes.store' title='Cliente'>
                <x-input-form label='nombre'></x-input-form>
                <x-input-form label='email' type='email'></x-input-form>
                <x-input-form label='fecha' type='date' text='Fecha de nacimiento' :val="date('Y-m-d')"></x-input-form>

                <div class="form-group">
                    <label>Sexo</label>
                    <select name="sexo" class="form-control" value="{{ old('sexo') }}">
                        <option selected value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
            </x-modal-add>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Pagos</th>
                    <th>Pesos</th>
                    <th>Editar</th>
                </x-slot>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ substr(str_repeat(0, 4) . $cliente->id, -4) }}</td>
                            <td>
                                @if ($cliente->planes_count > 0)
                                    <i class="fas fa-check-circle text-success"></i>
                                @else
                                    <i class="fas fa-exclamation-circle text-secondary"></i>
                                @endif
                                {{ $cliente->nombre }}
                            </td>
                            <td>{{ $cliente->sexo }}</td>
                            <td>
                                <a href="{{ route('planes.create', $cliente->id) }}"
                                    class="btn btn-primary btn-sm">Pagar</a>
                            </td>
                            <td>
                                <a href="{{ route('clientes.show', $cliente->id) }}"
                                    class="btn btn-outline-primary btn-sm">Pesos</a>
                            </td>
                            <td>
                                <a href="{{ route('clientes.edit', $cliente->id) }}"
                                    class="btn btn-secondary btn-sm">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table-head>
        </div>
    </div>
@endsection
<x-open-modal></x-open-modal>
