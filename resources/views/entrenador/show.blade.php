@extends('layout')

@section('title', 'Eventos')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('entrenador.index') }}">Entrenadores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Eventos</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-1 ruta="eventos.create" :id="$entrenador_id">Eventos</x-header-1>

        <x-table-head>
            <x-slot name='title'>
                <th>Fecha</th>
                <th>Evento</th>
                <th>Monto</th>
                <th>Nota</th>
            </x-slot>
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <td>{{ $evento->created_at }}</td>
                        <td>{{ $evento->tipo}}</td>
                        <td>C$ {{ $evento->monto}}</td>
                        <td>{{ $evento->nota }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
    </div>
@endsection
