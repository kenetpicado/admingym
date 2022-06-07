@extends('layout')

@section('title', 'Eventos')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('egresos.index')}}">Egresos</a></li>
                <li class="breadcrumb-item"><a href="{{route('entrenador.index')}}">Entrenadores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Eventos</li>
            </ol>
        </nav>

        <!-- DataTales -->
        <div class="card shadow mb-4">

            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">EVENTOS: {{ $entrenador->nombre }}</h6>
                <a href="#" class="d-inline btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                    data-target="#agregarEvento">
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
                                <th>Fecha</th>
                                <th>Evento</th>
                                <th>Monto</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entrenador->eventos as $evento)
                                <tr>
                                    <td>{{ $evento->id }}</td>
                                    <td>{{ $evento->created_at }}</td>
                                    @if ($evento->tipo == 'PAGO')
                                        <td>Se ha registrado un pago por la cantidad de: </td>
                                        <td>C$ {{ $evento->monto }}</td>
                                    @else
                                        <td><span class="badge badge-danger">Inasistencia</span></td>
                                        <td>-</td>
                                    @endif
                                    <td>{{ $evento->nota }}</td>
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
