@extends('layout')

@section('title', 'Pesos')

@section('contenido')
    <div class="container-fluid">

        <!-- DataTales -->
        <div class="card shadow mb-4">

            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">PESOS: {{ $cliente->nombre }}</h6>
                <a href="#" class="d-inline btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#agregarPeso">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <label class="m-0 d-none d-lg-inline">Agregar</label>
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha de registro</th>
                                <th>Peso en libras</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cliente->pesos as $peso)
                                <tr>
                                    <td>{{ $peso->id }}</td>
                                    <td>{{ $peso->created_at }}</td>
                                    <td>{{ $peso->peso }} libras</td>
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
            $('#agregarPeso').modal('show')
        </script>
    @endif
@endsection
