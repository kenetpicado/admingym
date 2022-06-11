@extends('layout')

@section('title', 'Inicio')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="alert alert-success" role="alert">
            Bienvenido {{ auth()->user()->name }}!
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Clientes totales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ver['clientes'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Ingresos {{ $ver['mes'] }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{ $ver['ingresos'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Planes activos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ver['cajas'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Egresos {{ $ver['mes'] }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{ $ver['egresos'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Ganancia {{ $ver['mes'] }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">C$
                                    {{ $ver['ingresos'] - $ver['egresos'] }}</div>
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
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Estadisticas</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Hombres<span class="float-right">{{ $sexo['M'] }} % </span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $sexo['M'] }}%"
                                aria-valuenow="{{ $sexo['M'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Mujeres<span class="float-right">{{ $sexo['F'] }} % </span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $sexo['F'] }}%"
                                aria-valuenow="{{ $sexo['F'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Activos del total registrado<span
                                class="float-right">{{ $ver['activos'] }} %</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $ver['activos'] }}%"
                                aria-valuenow="{{ $ver['activos'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Beca C$ {{ $ver['becas'] }} <span
                                class="float-right">{{ $ver['porcentaje'] }} %</span><small>{{ $ver['personas'] }}
                                beca(s)</small></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{ $ver['porcentaje'] }}%" aria-valuenow="{{ $ver['porcentaje'] }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Servicios</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Pesas<span class="float-right">{{ $servicios['PESAS'] }} %
                            </span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: {{ $servicios['PESAS'] }}%" aria-valuenow="{{ $servicios['PESAS'] }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Spinning<span
                                class="float-right">{{ $servicios['SPINNING'] }}% </span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: {{ $servicios['SPINNING'] }}%"
                                aria-valuenow="{{ $servicios['SPINNING'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Zumba<span class="float-right">{{ $servicios['ZUMBA'] }}
                                %</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: {{ $servicios['ZUMBA'] }}%" aria-valuenow="{{ $servicios['ZUMBA'] }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">ZUMBA+PESAS<span
                                class="float-right">{{ $servicios['ZUMBA+PESAS'] }} %</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: {{ $servicios['ZUMBA+PESAS'] }}%"
                                aria-valuenow="{{ $servicios['ZUMBA+PESAS'] }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')
