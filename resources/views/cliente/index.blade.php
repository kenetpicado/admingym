@extends('layout')

@section('title', 'Clientes')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>

        <!-- DataTales -->
        <div class="card mb-4">

            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">CLIENTES</h6>
                <a href="#" class="d-inline btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#agregar">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <label class="m-0 d-none d-lg-inline">Agregar</label>
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cliente ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Sexo</th>
                                <th>Pagos</th>
                                <th>Pesos</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ substr(str_repeat(0, 4) . $cliente->id, -4) }}</td>
                                    <td>
                                        @if ($cliente->planes_count > 0)
                                        <i class="fas fa-check-circle text-success"></i>
                                        @else
                                        <i class="fas fa-exclamation-circle text-danger"></i>
                                        @endif
                                        {{ $cliente->nombre }}
                                    </td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->sexo }}</td>
                                    <td>
                                        <a href="{{ route('planes.create', $cliente->id) }}"
                                            class="btn btn-primary btn-sm">Pagar</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('clientes.show', $cliente->id) }}"
                                            class="btn btn-outline-primary btn-sm">Pesos</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('clientes.edit', $cliente->id) }}"
                                            class="btn btn-secondary btn-sm">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')

@section('agregarModal')
    @include('cliente.modal')
@endsection

@section('re-open')
    @if ($errors->any())
        <script>
            $('#agregar').modal('show')
        </script>
    @endif
@endsection
