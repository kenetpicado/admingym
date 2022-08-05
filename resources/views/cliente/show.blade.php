@extends('layout')

@section('title', 'Pesos')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pesos</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-1 ruta="pesos.create" :id="$cliente_id">Pesos</x-header-1>

        <x-table-head>
            <x-slot name='title'>
                <th>Peso (libras)</th>
                <th>Fecha registro</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @foreach ($pesos as $peso)
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
@endsection
