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
                <th>Opciones</th>
            </x-slot>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ substr(str_repeat(0, 4) . $cliente->id, -4) }}</td>
                        <td>
                            @if ($cliente->planes_count > 0)
                                <i class="fas fa-check-circle fa-sm text-success"></i>
                            @else
                                <i class="fas fa-circle fa-sm text-secondary"></i>
                            @endif
                            {{ ucwords(strtolower($cliente->nombre)) }}
                        </td>
                        <td>{{ $cliente->sexo }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-expanded="false">
                                    Opciones
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('planes.create', $cliente->id) }}" class="dropdown-item">Pagar</a>
                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="dropdown-item">Pesos</a>
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="dropdown-item">Editar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
    </div>
@endsection
