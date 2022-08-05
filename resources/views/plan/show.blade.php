@extends('layout')

@section('title', 'Detalles')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('planes.index') }}">Planes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalles</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Detalles</x-header-0>

        <div class="row justify-content-center mb-4">
            <div class="col-lg-6">
                <div class="card-body">

                    <table class="table table-borderless" width="100%" cellspacing="0">
                        <th>
                            <tr class="text-uppercase small fw-bolder">
                                <th colspan="2">Detalles del plan</th>
                            </tr>
                        </th>
                        <tr>
                            <td width="50%">Cliente:</td>
                            <td>{{ $plan->cliente }}</td>
                        </tr>
                        <tr>
                            <td>Servicio:</td>
                            <td>{{ $plan->servicio }}</td>
                        </tr>
                        <tr>
                            <td>Plan:</td>
                            <td>{{ $plan->plan }}</td>
                        </tr>
                        <tr>
                            <td>Monto:</td>
                            <td>C$ {{ $plan->monto }}</td>
                        </tr>
                        <tr>
                            <td>Beca:</td>
                            <td>C$ {{ $plan->beca }}</td>
                        </tr>
                        <tr>
                            <td>Nota: </td>
                            <td>{{ $plan->nota }}</td>
                        </tr>
                        <tr>
                            <td>Inicia: </td>
                            <td>{{ $plan->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Expira: </td>
                            <td>{{ $plan->fecha_fin }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
