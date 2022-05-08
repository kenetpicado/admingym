@extends('layout')

@section('title', 'Caja')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Planes activos</li>
            </ol>
        </nav>

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">PLANES ACTIVOS</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Servicio</th>
                                <th>Monto - Beca</th>
                                <th>Rango</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cajas as $caja)
                                <tr>
                                    <td>{{ $caja->cliente->nombre }}</td>
                                    <td>{{ $caja->servicio }}</td>
                                    <td>
                                        C$ {{ $caja->monto }}
                                        @if ($caja->beca > 0)
                                            <div class="badge badge-success">
                                                {{ $caja->beca }} %
                                            </div>
                                        @endif
                                    </td>
                                    <td> 
                                        <div class="badge badge-primary">
                                            {{ date('d-F-y', strtotime($caja->created_at)) }}
                                        </div>
                                        <div class="badge badge-danger">
                                            {{ date('d-F-y', strtotime($caja->fecha_fin)) }}
                                        </div>
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
@endsection('contenido')

@section('re-open')
    @if ($errors->any())
        <script>
            $('#agregarCliente').modal('show')
        </script>
    @endif
@endsection
