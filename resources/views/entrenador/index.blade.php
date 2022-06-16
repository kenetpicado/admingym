@extends('layout')

@section('title', 'Entrenadores')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Entrenadores</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <x-header-1 modelo="Entrenadores"></x-header-1>

            {{-- FORM STORE --}}
            <x-modal-add ruta='entrenador.store' title='Entrenador'>
                <x-input-form label='nombre'></x-input-form>
                <x-input-form label='telefono'></x-input-form>
                <x-input-form label='horario'></x-input-form>
            </x-modal-add>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Horario</th>
                    <th>Eventos</th>
                    <th>Editar</th>
                </x-slot>
                <tbody>
                    @foreach ($entrenadors as $entrenador)
                        <tr>
                            <td>{{ $entrenador->nombre }}</td>
                            <td>{{ $entrenador->telefono }}</td>
                            <td>{{ $entrenador->horario }}</td>
                            <td>
                                <a href="{{ route('entrenador.show', $entrenador->id) }}"
                                    class="btn btn-primary btn-sm">Eventos</a>
                            </td>
                            <td>
                                <a href="{{ route('entrenador.edit', $entrenador) }}"
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
