@extends('layout')

@section('title', 'Entrenadores')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Entrenadores</li>
            </ol>
        </nav>

        <!-- DataTales -->
        <div class="card mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">ENTRENADORES</h6>
                <a href="#" class="d-inline btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#agregarEntrenador">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <label class="m-0 d-none d-lg-inline">Agregar</label>
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Horario</th>
                                <th>Eventos</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entrenadors as $entrenador)
                                <tr>
                                    <td>{{ $entrenador->nombre }}</td>
                                    <td>{{ $entrenador->telefono }}</td>
                                    <td>{{ $entrenador->horario }}</td>
                                    <td>
                                        <a href="{{ route('entrenador.show', $entrenador->id) }}"
                                            class="btn btn-primary btn-sm">Eventos</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('entrenador.edit', $entrenador) }}"
                                            class="btn btn-secondary btn-sm">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection('contenido')

@section('agregarModal')
    @include('entrenador.modal')
@endsection

@section('re-open')
    @if ($errors->any())
        <script>
            $('#agregarEntrenador').modal('show')
        </script>
    @endif
@endsection
