@extends('layout')

@section('title', 'Ingresos')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between m-2">
            <h1 class="h3 mb-0 text-gray-800">Ingresos</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#ver">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Establecer rango
            </a>
        </div>


        <div class="row">
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Ingresos totales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{ $ver['total'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Ingresos mensuales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{ $ver['activo'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pago a entrenadores</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{ $ver['entrenadores'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Consulta personalizada</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <p>
                            Se muestran todos los ingresos en un rango de fechas especifico.
                        </p>
                        @if (session('ingresos'))
                            <p>
                                <strong>
                                    {{ session('mensaje') }}
                                </strong>
                            </p>
                        @endif

                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Servicio</th>
                                <th>Monto</th>
                                <th>Beca</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('ingresos'))
                                @foreach (session('ingresos') as $ingreso)
                                    <tr>
                                        <td>{{ date('d-F-Y', strtotime($ingreso->created_at)) }}</td>
                                        <td>{{ $ingreso->nombre }}</td>
                                        <td>{{ $ingreso->servicio }}</td>
                                        <td>C$ {{ $ingreso->monto }}</td>
                                        <td>
                                            @if ($ingreso->beca > 0)
                                            <div class="badge badge-success">
                                                C$ {{ $ingreso->beca }}
                                            </div>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')

@section('agregarModal')
    @include('ingreso.modal')
@endsection

@section('re-open')
    @if ($errors->any())
        <script>
            $('#ver').modal('show')
        </script>
    @endif
@endsection
