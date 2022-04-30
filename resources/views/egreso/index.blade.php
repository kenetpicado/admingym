@extends('layout')

@section('title', 'Egresos')

@section('contenido')

    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Egresos</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Egresos totales</div>
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
                                    Egresos mensuales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{ $ver['mes'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <!-- Color System -->
                <div class="row">
                    <a href="{{ route('egreso.ver', 'AGUA') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Agua
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'ENERGIA') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Energia
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'INTERNET') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Internet
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'LIMPIEZA') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Limpieza
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'SUPLEMENTOS-LIMPIEZA') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Supl. Limpieza
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'RENTA') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Renta
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'IMPUESTOS') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Impuestos
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'PUBLICIDAD') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Publicidad
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'MEMBRESIA') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Membresia
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'PAPELERIA') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Papeleria
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'EQUIPOS') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Equipos
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'INFRAESTRUCTURA') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Infraestructura
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'TIENDA') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Tienda
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'SUPLEMENTOS') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Suplementos
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'BAR') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Bar
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('egreso.ver', 'SALARIOS') }}" class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Salarios
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">

            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">CONSULTA</h6>
                <a href="#" class="d-inline btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ver">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <label class="m-0 d-none d-lg-inline">Establecer rango</label>
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <p>
                            Se muestran todos los egresos en un rango de fechas especifico.
                        </p>
                        @if (session('egresos'))
                            <p>
                                <strong>
                                    {{ session('mensaje') }}
                                </strong>
                            </p>
                        @endif

                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('egresos'))
                                @foreach (session('egresos') as $egreso)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($egreso->created_at)) }}</td>
                                        <td>{{ $egreso->tipo }}</td>
                                        <td>{{ $egreso->monto }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ver-->
        <div class="modal fade" id="ver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Consulta personalizada</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('egreso.consulta') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>
                                <strong>
                                    Seleccione la fecha de inicio y fin de la consulta.
                                </strong>

                            </p>
                            <div class="form-group">
                                <label>Fecha inicio</label>
                                <input type="date" name="inicio" class="form-control @error('inicio') is-invalid @enderror"
                                    autocomplete="off" value="{{ old('inicio') }}">
                                @error('inicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Fecha fin</label>
                                <input type="date" name="fin" class="form-control @error('fin') is-invalid @enderror"
                                    autocomplete="off" value="{{ old('fin', date('Y-m-d')) }}">
                                @error('fin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
