@extends('layout')

@section('title', 'Caja')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Planes</li>
@endsection

@section('contenido')

        <div class="card">
            <x-header-0>Planes</x-header-0>

            <x-table-head>
                <div class="card-title">
                    <div class="alert alert-danger" role="alert">
                        {{ $registro->status ?? '0' }} nuevos planes expirados.
                    </div>
                </div>

                <x-slot name='title'>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Rango</th>
                    <th>Nota</th>
                    <th>Opciones</th>
                </x-slot>
                <tbody>
                    @foreach ($planes as $plan)
                        <tr>
                            <td>{{ $plan->cliente_nombre }}</td>
                            <td>{{ $plan->servicio }}</td>
                            <td>
                                <div class="badge badge-light">
                                    {{ date('d-m-Y', strtotime($plan->created_at)) }}
                                </div>
                                <div class="badge badge-primary">
                                    {{ date('d-m-Y', strtotime($plan->fecha_fin)) }}
                                </div>
                            </td>
                            <td>{{ $plan->nota }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('planes.show', $plan->id) }}" class="dropdown-item">Detalles</a>
                                        <a href="{{ route('planes.edit', $plan->id) }}" class="dropdown-item">Editar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table-head>
        </div>
@endsection
