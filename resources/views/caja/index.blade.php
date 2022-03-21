@extends('layout')

@section('title', 'Activos')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">
            @if (session('info'))
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>{{ session('info') }}</h4>
                        </div>
                    </div>
                </div>
            @endif
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PLANES ACTIVOS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Servicio</th>
                                            <th>Fecha inicio</th>
                                            <th>Expira</th>
                                            <th>Nota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cajas as $caja)
                                            <tr>
                                                <td>{{ $caja->cliente->nombre}}</td>
                                                <td>{{ $caja->servicio }}</td>
                                                <td>
                                                    <div class="alert alert-primary">{{ $caja->fecha_inicio }}</div>
                                                </td>
                                                <td>
                                                    <div class="alert alert-danger">{{ $caja->fecha_fin }}</div>
                                                </td>
                                                <td>{{ $caja->nota }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')
