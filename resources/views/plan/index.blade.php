@extends('layout')

@section('title', 'Caja')

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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Servicio</th>
                                <th>Monto-Beca</th>
                                <th>Rango</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($planes as $plan)
                                <tr>
                                    <td>{{ substr(str_repeat(0, 4) . $plan->cliente->id, -4) }}</td>
                                    <td>
                                        {{ $plan->cliente->nombre }}
                                    </td>
                                    <td>
                                        <a href="{{ route('planes.edit', $plan->id) }}" class="btn btn-primary btn-sm btn-block">
                                            {{-- <i class="fas fa-cog"></i> --}}
                                            {{ $plan->servicio }}
                                        </a>
                                       
                                    </td>
                                    <td>
                                        C${{ $plan->monto }} <small>(C${{ $plan->beca }})</small>
                                    </td>
                                    <td>
                                        <div class="badge badge-primary">
                                            {{ date('d-F-y', strtotime($plan->created_at)) }}
                                        </div>
                                        <div class="badge badge-danger">
                                            {{ date('d-F-y', strtotime($plan->fecha_fin)) }}
                                        </div>
                                    </td>
                                    <td>{{ $plan->nota }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')
