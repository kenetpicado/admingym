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
                                            <th>Plan</th>
                                            <th>Nota</th>
                                            <th>Fecha inicio</th>
                                            <th>Expira</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($caja as $item)
                                            <tr>
                                                <td>{{ $item->nombre }}</td>
                                                <td>{{ $item->servicio }}</td>
                                                <td>{{ $item->plan }}</td>
                                                <td>{{ $item->nota }}</td>
                                                <td>
                                                    <div class="alert alert-primary">{{ $item->fecha_inicio }}</div>
                                                </td>
                                                <td>
                                                    <div class="alert alert-danger">{{ $item->fecha_fin }}</div>
                                                </td>
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
