@extends('layout')

@section('title', 'Caja')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between m-2">
            <h1 class="h3 mb-0 text-gray-800">Planes activos</h1>
        </div>

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Todos los clientes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Servicio</th>
                                <th>Inicio</th>
                                <th>Expira</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cajas as $caja)
                                <tr>
                                    <td>{{$caja->id}}</td>
                                    <td>{{ $caja->cliente->nombre }}</td>
                                    <td>{{ $caja->servicio }}</td>
                                    <td>{{date("d - F - Y",  strtotime($caja->created_at))}}</td>
                                    <td>
                                        <div class="badge badge-danger">
                                            {{date("d - F - Y",  strtotime($caja->fecha_fin))}}

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

        {{-- @include('caja.modal') --}}

    </div>
@endsection('contenido')

@section('re-open')
    @if ($errors->any())
        <script>
            $('#agregarCliente').modal('show')
        </script>
    @endif
@endsection
