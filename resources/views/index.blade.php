@extends('layout')

@section('title', 'Inicio')

@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inicio</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Clientes totales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ver['clientes']}}</div>
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
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Ingresos activos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{$ver['ingresos']}}</div>
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
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Planes activos
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ver['cajas']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Entrenadores</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ver['entrenadores']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-walking fa-2x text-gray-300"></i>
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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Estadisticas</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Hombres<span
                            class="float-right">{{$sexo['M']}} % </span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$sexo['M']}}%"
                            aria-valuenow="{{$sexo['M']}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Mujeres<span
                            class="float-right">{{$sexo['F']}} % </span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$sexo['F']}}%"
                            aria-valuenow="{{$sexo['F']}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Activos del total registrado<span
                            class="float-right">{{$ver['activos']}} %</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$ver['activos']}}%"
                            aria-valuenow="{{$ver['activos']}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Becas<span
                            class="float-right">{{$ver['becas']}} ({{$ver['porcentaje']}} % de los activos)</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$ver['porcentaje']}}%"
                            aria-valuenow="{{$ver['porcentaje']}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Servicios</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Pesas<span
                            class="float-right">{{$servicios['PESAS']}} % </span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$servicios['PESAS']}}%"
                            aria-valuenow="{{$servicios['PESAS']}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Spinning<span
                            class="float-right">{{$servicios['SPINNING']}}% </span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$servicios['SPINNING']}}%"
                            aria-valuenow="{{$servicios['SPINNING']}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Zumba<span
                            class="float-right">{{$servicios['ZUMBA']}} %</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$servicios['ZUMBA']}}%"
                            aria-valuenow="{{$servicios['ZUMBA']}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Taekwondo<span
                            class="float-right">{{$servicios['TAEKWONDO']}} %</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$servicios['TAEKWONDO']}}%"
                            aria-valuenow="{{$servicios['TAEKWONDO']}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('contenido')