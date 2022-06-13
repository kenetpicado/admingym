@extends('layout')

@section('title', 'Notificaciones')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Notificaciones</li>
            </ol>
        </nav>

        <!-- DataTales -->
        <div class="card mb-4">

            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">NOTIFICACIONES</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Fecha expiración</th>
                                <th>Cliente</th>
                                <th>Plan</th>
                                <th>Pagar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportes as $reporte)
                                <tr>
                                    <td>{{ $reporte->created_at }}</td>
                                    <td>{{ $reporte->cliente->nombre }}</td>
                                    <td>{{ $reporte->mensaje }}</td>
                                    <td>
                                        <a href="{{ route('planes.create', $reporte->cliente->id) }}"
                                            class="btn btn-outline-primary btn-sm">Volver a pagar</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('reporte.destroy', $reporte->id) }}"
                                            class="btn btn-outline-danger btn-sm">Eliminar</a>
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
