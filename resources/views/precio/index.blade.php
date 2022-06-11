@extends('layout')

@section('title', 'Precios')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Planes activos</li>
            </ol>
        </nav>

        <!-- DataTales -->
        <div class="card mb-4">

            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">PLANES ACTIVOS</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Servicio</th>
                                <th>Plan</th>
                                <th>Monto</th>
                                <th>Opcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($precios as $key => $precio)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $precio->servicio }}</td>
                                    <td>{{ $precio->plan }}</td>
                                    <td>{{ $precio->monto }}</td>
                                    <td>
                                        <a href="{{route('precios.edit', $precio->id)}}" class="btn btn-primary btn-sm">
                                            Editar
                                        </a>
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

@section('re-open')
    @if ($errors->any())
        <script>
            $('#agregarCliente').modal('show')
        </script>
    @endif
@endsection
