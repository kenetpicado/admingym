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
            <div class="card border-left-primary">
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
                                        <a href="{{ route('egreso.ver', 'agua') }}"
                                            class="btn btn-primary btn-sm btn-block">AGUA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'energia') }}"
                                            class="btn btn-primary btn-sm btn-block">ENERGIA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'internet') }}"
                                            class="btn btn-primary btn-sm btn-block">INTERNET</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'limpieza') }}"
                                            class="btn btn-primary btn-sm btn-block">LIMPIEZA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'articulos-limpieza') }}"
                                            class="btn btn-primary btn-sm btn-block">ARTICULOS LIMPIEZA</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'impuestos') }}"
                                            class="btn btn-primary btn-sm btn-block">IMPUESTOS</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'publicidad') }}"
                                            class="btn btn-primary btn-sm btn-block">PUBLICIDAD</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'membresia') }}"
                                            class="btn btn-primary btn-sm btn-block">MEMBRESIA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'papeleria') }}"
                                            class="btn btn-primary btn-sm btn-block">PAPELERIA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'equipo-maquinaria') }}"
                                            class="btn btn-primary btn-sm btn-block">EQUIPO Y MAQUINARIA</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'tienda') }}"
                                            class="btn btn-primary btn-sm btn-block">TIENDA</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'suplementos') }}"
                                            class="btn btn-primary btn-sm btn-block">SUPLEMENTOS</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'servicios') }}"
                                            class="btn btn-primary btn-sm btn-block">SERVICIOS</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('egreso.ver', 'bebidas') }}"
                                            class="btn btn-primary btn-sm btn-block">BEBIDAS</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <x-header-2 text="Egresos">
                <x-dp-item modal="agregar" text="Agregar"></x-dp-item>
                <a class="dropdown-item" href="#">Rango</a>
            </x-header-2>

            {{-- FORM STORE --}}
            <x-modal-add ruta='egresos.store' title='Egreso'>
                <x-input-form label="tipo" text="Concepto"></x-input-form>
                <x-input-form label='nota' text="Descripción"></x-input-form>
                <x-input-form label='monto' type='number'></x-input-form>
                <x-input-form label='created_at' type='date' text="Fecha" :val="date('Y-m-d')"></x-input-form>
            </x-modal-add>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>Concepto</th>
                    <th>Descripcion</th>
                    <th>Monto C$</th>
                    <th>Fecha</th>
                </x-slot>
                <tbody>
                    @foreach ($egresos as $egreso)
                        <tr>
                            <td>{{ $egreso->tipo }}</td>
                            <td>{{ $egreso->nota }}</td>
                            <td>{{ $egreso->monto }}</td>
                            <td>{{ date('d F Y', strtotime($egreso->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table-head>
        </div>
    </div>
@endsection
<x-open-modal></x-open-modal>