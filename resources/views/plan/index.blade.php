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
                            @foreach ($planes as $planes)
                                <tr>
                                    <td>{{ $planes->cliente->nombre }}</td>
                                    <td>{{ $planes->servicio }}</td>
                                    <td>
                                        C$ {{ $planes->monto }}
                                        @if ($planes->beca > 0)
                                            <div class="badge badge-success">
                                                {{ $planes->beca }} %
                                            </div>
                                        @endif
                                    </td>
                                    <td> 
                                        <div class="badge badge-primary">
                                            {{ date('d-F-y', strtotime($planes->created_at)) }}
                                        </div>
                                        <div class="badge badge-danger">
                                            {{ date('d-F-y', strtotime($planes->fecha_fin)) }}
                                        </div>
                                    </td>
                                    <td>{{ $planes->nota }}</td>
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
