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
                <div class="card border-left-primary h-100 py-2">
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
                <div class="card border-left-success h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Egresos {{ $ver['mes'] }}</div>
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

        <div class="accordion mb-4" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h6 class="m-0 font-weight-bold text-primary">VER CATEGORIAS</h6>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" width="100%" cellspacing="0">
                                <tr>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'agua') }}">AGUA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'energia') }}">ENERGIA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'internet') }}">INTERNET</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'limpieza') }}">LIMPIEZA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'articulos-limpieza') }}">ARTICULOS LIMPIEZA</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'impuestos') }}">IMPUESTOS</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'publicidad') }}">PUBLICIDAD</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'membresia') }}">MEMBRESIA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'papeleria') }}">PAPELERIA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'equipo-maquinaria') }}">EQUIPO Y MAQUINARIA</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'tienda') }}">TIENDA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'suplementos') }}">SUPLEMENTOS</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'servicios') }}">SERVICIOS</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">CONSULTA</h6>
                <a href="{{ route('egresos.create') }}" class="d-inline btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <label class="m-0 d-none d-lg-inline">Registrar egreso</label>
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <p>
                            Se muestran todos los egresos en un rango de fechas especifico.
                            <a href="#" data-toggle="modal" data-target="#ver">
                                <label>Establecer rango</label>
                            </a>
                        </p>
                        <p>
                            Para ver todos los egresos haga <a href="{{route('egreso.all')}}">clic aqui</a>
                        </p>

                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Nota</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('egresos'))
                                @foreach (session('egresos') as $egreso)
                                    <tr>
                                        <td>{{ $egreso->tipo }}</td>
                                        <td>{{ $egreso->nota }}</td>
                                        <td>C$ {{ $egreso->monto }}</td>
                                        <td>{{ date('d F Y', strtotime($egreso->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align-last: right" colspan="2">Total</th>
                                <th>C$ {{ session('mensaje') }}</th>

                            </tr>
                        </tfoot>
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
