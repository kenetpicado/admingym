@extends('layout')

@section('title', 'Clientes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-modal>Clientes</x-header-modal>

        <div class="card-body">
            <div class="row">
                <form method="POST" action="{{ route('clientes.search') }}" class="col-12 col-sm-6">
                    @csrf
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="Buscar por nombre o ID">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <x-modal title="Cliente" route="clientes.store">
            <x-input name='nombre'></x-input>
            <x-input name='email' type='email'></x-input>
            <x-input name='fecha' type='date' label='Fecha de nacimiento'></x-input>

            <div class="form-group">
                <div class="custom-control custom-radio custom-control-inline ">
                    <input type="radio" id="customRadioInline1" name="sexo" class="custom-control-input" value="M"
                        checked>
                    <label class="custom-control-label" for="customRadioInline1">Masculino</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="sexo" class="custom-control-input"
                        value="F">
                    <label class="custom-control-label" for="customRadioInline2">Femenino</label>
                </div>
            </div>
        </x-modal>

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
                @forelse ($clientes as $cliente)
                    <tr>
                        <td data-title="ID">{{ $cliente->id }}</td>
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
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </x-table-head>
        <div class="mx-auto small">
            {!! $clientes->links() !!}
        </div>
    </div>
@endsection
