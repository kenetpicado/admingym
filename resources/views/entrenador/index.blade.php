@extends('layout')

@section('title', 'Entrenadores')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex align-items-center justify-content-between m-2">
            <h1 class="h3 mb-0 text-gray-800">Entrenadores</h1>
            <a href="#" class="d-inline btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                data-target="#agregarEntrenador">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                <label class="m-0 d-none d-lg-inline">Agregar</label>
            </a>
        </div>

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Todos los entrenadores</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Horario</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entrenadors as $entrenador)
                                <tr>
                                    <td>{{ $entrenador->id }}</td>
                                    <td>{{ $entrenador->nombre }}</td>
                                    <td>{{ $entrenador->telefono }}</td>
                                    <td>{{ $entrenador->horario }}</td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Ver opciones <i class="fas fa-cogs"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">

                                                <a href="{{ route('entrenador.edit', $entrenador) }}"
                                                    class="dropdown-item">Editar</a>

                                                <a href="{{ route('entrenador.show', $entrenador) }}"
                                                    class="dropdown-item">Eventos</a>

                                                <a href="" class="dropdown-item" data-toggle="modal"
                                                    data-target="#eliminarEntrenador">Eliminar</a>
                                            </div>
                                        </div>
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
