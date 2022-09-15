@extends('layout')

@section('title', 'Clientes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-1 ruta="clientes.create">Clientes</x-header-1>

        <x-table-head>
            <x-slot name='title'>
                <th>ID</th>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Pagar</th>
                <th>Pesos</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td data-title="ID">{{ substr(str_repeat(0, 4) . $cliente->id, -4) }}</td>
                        <td data-title="Nombre">
                            @if ($cliente->planes_count > 0)
                                <i class="fas fa-check-circle fa-sm text-success"></i>
                            @else
                                <i class="fas fa-circle fa-sm text-secondary"></i>
                            @endif
                            {{ $cliente->nombre }}
                        </td>
                        <td data-title="Sexo">{{ $cliente->sexo }}</td>
                        <td>
                            <a href="{{ route('planes.create', $cliente->id) }}" class="btn btn-sm btn-primary">Pagar</a>
                        </td>
                        <td>
                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-primary">Pesos</a>
                        </td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
        <div class="mx-auto small">
            {!! $clientes->links() !!}
        </div>
    </div>
@endsection
