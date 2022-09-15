@extends('layout')

@section('title', 'Pesos')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pesos</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-modal>Pesos</x-header-modal>

        <x-modal title="Peso" route="pesos.store">
            <x-input name='peso' label='Peso en libras'></x-input>
            <x-input name='created_at' type="date" label='Fecha de registro' :val="date('Y-m-d')"></x-input>
            <input type="hidden" name="cliente_id" value="{{ $cliente_id }}">
        </x-modal>

        <x-table-head>
            <x-slot name='title'>
                <th>Peso (libras)</th>
                <th>Fecha registro</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @forelse ($pesos as $peso)
                    <tr>
                        <td>{{ $peso->peso }}</td>
                        <td>{{ $peso->created_at }}</td>
                        <td>
                            <a href="{{ route('pesos.edit', $peso->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </x-table-head>
    </div>
@endsection
