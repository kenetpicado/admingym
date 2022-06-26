@extends('layout')

@section('title', 'Eventos')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('entrenador.index') }}">Entrenadores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Eventos</li>
            </ol>
        </nav>
        <x-info></x-info>

        <div class="card mb-4">
            <x-header-1 modelo="Eventos"></x-header-1>

            {{-- FORM STORE --}}
            <x-modal-add ruta='eventos.store' title='Evento'>

                <div class="form-group">
                    <label>Seleccione un evento</label>
                    <select name="tipo" class="form-control" required>
                        <option selected value="PAGO">REGISTRAR PAGO</option>
                        <option value="INASISTENCIA">INASISTENCIA</option>
                    </select>
                </div>

                <x-input-form label='monto' type="number"></x-input-form>
                <x-input-form label='nota'></x-input-form>
                <x-input-form label='created_at' text="Fecha" type="date" :val="date('Y-m-d')"></x-input-form>

                <input type="hidden" name="entrenador_id" value="{{ $entrenador->id }}">
                <input type="hidden" name="name" value="{{ $entrenador->nombre }}">
            </x-modal-add>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>Fecha</th>
                    <th>Evento</th>
                    <th>Monto</th>
                    <th>Nota</th>
                </x-slot>
                <tbody>
                    @foreach ($entrenador->eventos as $evento)
                        <tr>
                            <td>{{ $evento->created_at }}</td>
                            @if ($evento->tipo == 'PAGO')
                                <td>Se ha registrado un pago por la cantidad de: </td>
                                <td>C$ {{ $evento->monto }}</td>
                            @else
                                <td><span class="badge badge-danger">Inasistencia</span></td>
                                <td>-</td>
                            @endif
                            <td>{{ $evento->nota }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table-head>
        </div>
    </div>
@endsection
<x-open-modal></x-open-modal>
