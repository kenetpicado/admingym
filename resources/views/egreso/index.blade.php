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

        <div class="card mb-4">
            <x-header-2 text="Egresos">
                <x-dp-item modal="agregar" text="Agregar"></x-dp-item>
                <a class="dropdown-item" href="{{ route('egresos.categorias') }}">Ver categorías</a>
                <a class="dropdown-item" href="{{ route('egresos.rango') }}">Ver rango</a>
            </x-header-2>

            {{-- FORM STORE --}}
            <x-modal-add ruta='egresos.store' title='Egreso'>
                <x-input-list label="tipo" text="Concepto" list="egresos-categorias"></x-input-list>
                <x-input-form label='nota' text="Descripción"></x-input-form>
                <x-input-form label='monto' type='number'></x-input-form>
                <x-input-form label='created_at' type='date' text="Fecha" :val="date('Y-m-d')"></x-input-form>
            </x-modal-add>

            <x-cat-egresos></x-cat-egresos>


            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>Concepto</th>
                    <th>Descripcion</th>
                    <th>Monto C$</th>
                    <th>Fecha</th>
                    <th>Editar</th>
                </x-slot>
                <tbody>
                    @foreach ($egresos as $egreso)
                        <tr>
                            <td>{{ $egreso->tipo }}</td>
                            <td>{{ $egreso->nota }}</td>
                            <td>{{ $egreso->monto }}</td>
                            <td>{{ date('d F Y', strtotime($egreso->created_at)) }}</td>
                            <td>
                                <a href="{{ route('egresos.edit', $egreso->id) }}"
                                    class="btn btn-secondary btn-sm">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table-head>
        </div>
    </div>
@endsection
<x-open-modal></x-open-modal>
