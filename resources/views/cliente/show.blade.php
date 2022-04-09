@extends('layout')

@section('title', 'Pesos')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between m-2">
            <h1 class="h3 mb-0 text-gray-800">Peso</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#agregarPeso">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Agregar
            </a>
        </div>

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Todos los pesos del cliente: {{$cliente->nombre}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Fecha de registro</th>
                                <th>Peso en libras</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cliente->pesos as $peso)
                            <tr>
                                <td>{{$peso->created_at}}</td>
                                <td>{{$peso->peso}} libras</td>
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
