@extends('layout')

@section('title', 'Ingresos')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ingresos</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary h-100 py-2">
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
                <div class="card border-left-success h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Ingresos {{ $ver['mes'] }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{ $ver['activo'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">

            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">CONSULTA</h6>
                <a href="{{ route('ingreso.create') }}" class="d-inline btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <label class="m-0 d-none d-lg-inline">Registrar ingreso</label>
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <p>
                            Se muestran todos los ingresos en un rango de fechas especifico:
                            <a href="#" data-toggle="modal" data-target="#ver">
                                <label>Establecer rango</label>
                            </a>
                        </p>
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
                                        <td>C${{ $ingreso->monto }}</td>
                                        <td>
                                            @if ($ingreso->beca > 0)
                                                C${{ $ingreso->beca }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align-last: right" colspan="3">Total</th>
                                <th>C$ {{ session('mensaje') }}</th>
                                <th></th>
                            </tr>
                        </tfoot>
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
