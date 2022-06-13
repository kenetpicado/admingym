@extends('layout')

@section('title', 'Egresos')

@section('contenido')

    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('egresos.index') }}">Egresos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Todos</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">TODOS LOS EGRESOS</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Nota</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($egresos as $egreso)
                                <tr>
                                    <td>{{ $egreso->tipo }}</td>
                                    <td>{{ $egreso->nota }}</td>
                                    <td>C$ {{ $egreso->monto }}</td>
                                    <td>{{ date('d F Y', strtotime($egreso->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('egresos.edit', $egreso->id) }}"
                                            class="btn btn-primary btn-sm">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
