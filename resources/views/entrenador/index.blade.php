@extends('layout')

@section('title', 'Entrenadores')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Entrenadores</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-1 ruta="entrenador.create">Entrenadores</x-header-1>
        <x-table-head>
            <x-slot name='title'>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Horario</th>
                <th>Eventos</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @foreach ($entrenadors as $entrenador)
                    <tr>
                        <td>{{ $entrenador->id }}</td>
                        <td>{{ $entrenador->nombre }}</td>
                        <td>{{ $entrenador->telefono }}</td>
                        <td>{{ $entrenador->horario }}</td>
                        <td>
                            <a href="{{ route('entrenador.show', $entrenador->id) }}"
                                class="btn btn-primary btn-sm">Eventos</a>
                        </td>
                        <td>
                            <a href="{{ route('entrenador.edit', $entrenador) }}" class="btn btn-secondary btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
    </div>
@endsection
