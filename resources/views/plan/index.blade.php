@extends('layout')

@section('title', 'Planes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Planes</li>
@endsection

@section('contenido')

    <div class="card">
        <x-header-0>Planes</x-header-0>
        <x-search route="planes.search"></x-search>
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
                <th>Detalles</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @forelse ($planes as $plan)
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
                        <td><a href="{{ route('planes.show', $plan->id) }}" class="btn btn-sm btn-primary">Detalles</a></td>
                        <td><a href="{{ route('planes.edit', $plan->id) }}" class="btn btn-sm btn-secondary">Editar</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </x-table-head>
        <div class="mx-auto small">
            {!! $planes->links() !!}
        </div>
    </div>
@endsection
