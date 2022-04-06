@extends('layout')

@section('title', 'Eventos')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between m-2">
            <h1 class="h3 mb-0 text-gray-800">Eventos del entrenador: {{ $entrenador->nombre }}</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#agregarEvento">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Agregar
            </a>
        </div>

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Todos los eventos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Evento</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entrenador->eventos as $evento)
                                <tr>
                                    <td>{{date("d - F - Y",  strtotime($evento->created_at))}}</td>
                                    @if ($evento->tipo == 'PAGO')
                                        <td>Se ha registrado un pago por la cantidad de: </td>
                                        <td><strong>C$ {{ $evento->monto }}</strong> </td>
                                    @else
                                        <td><span class="badge badge-danger">Inasistencia</span></td>
                                        <td>-</td>
                                    @endif
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
    @include('entrenador.modal')
@endsection

@section('re-open')
    @if ($errors->any())
        <script>
            $('#agregarEvento').modal('show')
        </script>
    @endif
@endsection
