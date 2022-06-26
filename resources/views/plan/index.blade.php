@extends('layout')

@section('title', 'Caja')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Planes</li>
            </ol>
        </nav>

        <x-info></x-info>

        <div class="card mb-4">
            <x-header-0 text='Planes'></x-header-0>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Monto-Beca</th>
                    <th>Rango</th>
                    <th>Nota</th>
                </x-slot>
                <tbody>
                    @foreach ($planes as $plan)
                        <tr>
                            <td>
                                {{ substr(str_repeat(0, 4) . $plan->cliente->id, -4) }} -
                                {{ $plan->cliente->nombre }}
                            </td>
                            <td>
                                <a href="{{ route('planes.edit', $plan->id) }}">
                                    <i class="fas fa-cog"></i>
                                </a>
                                {{ $plan->servicio }}
                            </td>
                            <td>
                                C$ {{ $plan->monto }}
                                @if ($plan->beca > 0)
                                    ({{ $plan->beca }})
                                @endif

                            </td>
                            <td>
                                <div class="badge badge-light">
                                    {{ date('d-F-y', strtotime($plan->created_at)) }}
                                </div>
                                <div class="badge badge-primary">
                                    {{ date('d-F-y', strtotime($plan->fecha_fin)) }}
                                </div>
                            </td>
                            <td>{{ $plan->nota }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table-head>
        </div>
    </div>
@endsection
