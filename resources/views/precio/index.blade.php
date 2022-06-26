@extends('layout')

@section('title', 'Precios')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Precios</li>
            </ol>
        </nav>
        <x-info></x-info>

        <div class="card mb-4">
            <x-header-0 text='Precios'></x-header-0>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>#</th>
                    <th>Servicio</th>
                    <th>Plan</th>
                    <th>Precio</th>
                    <th>Opcion</th>
                </x-slot>
                <tbody>
                    @foreach ($precios as $key => $precio)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $precio->servicio }}</td>
                            <td>{{ $precio->plan }}</td>
                            <td>C$ {{ $precio->monto }}</td>
                            <td>
                                <a href="{{ route('precios.edit', $precio->id) }}" class="btn btn-primary btn-sm">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table-head>
        </div>
    </div>
@endsection
