@extends('layout')

@section('title', 'Egresos')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Egresos</li>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Egresos totales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{ number_format($ver['total']) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Egresos {{ $ver['mes'] }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">C$ {{ number_format($ver['activo']) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <x-header-1 ruta="egresos.create">Egresos</x-header-1>

        <x-table-head>
            <div class="card-title">
                <a href="{{route('egresos.rango')}}" class="p-2">Consulta por rango de fechas</a>
                <a href="{{route('egresos.categorias')}}" class="p-2">Consulta por categorias</a>
            </div>

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
                        <td>{{ $egreso->concepto }}</td>
                        <td>{{ $egreso->descripcion }}</td>
                        <td>{{ $egreso->monto }}</td>
                        <td>{{ $egreso->created_at }}</td>
                        <td>
                            <a href="{{ route('egresos.edit', $egreso->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
    </div>

@endsection
