@extends('layout')

@section('title', 'Reportes')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reportes</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <x-header-0 text='Reportes'></x-header-0>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>Cliente</th>
                    <th>Plan</th>
                    <th>Fecha expiración</th>
                    <th>Pagar</th>
                    <th>Eliminar</th>
                </x-slot>
                <tbody>
                    @foreach ($reportes as $reporte)
                        <tr>
                            <td>{{ $reporte->cliente->nombre }}</td>
                            <td>{{ $reporte->mensaje }}</td>
                            <td>{{ $reporte->created_at }}</td>
                            <td>
                                <a href="{{ route('planes.create', $reporte->cliente->id) }}"
                                    class="btn btn-primary btn-sm">Pagar</a>
                            </td>
                            <td>
                                <a href="{{ route('reporte.destroy', $reporte->id) }}"
                                    class="btn btn-secondary btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table-head>
        </div>
    </div>
@endsection
