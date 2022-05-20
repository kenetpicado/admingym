@extends('layout')

@section('title', 'Entrenadores')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('egresos.index')}}">Egresos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Entrenadores</li>
            </ol>
        </nav>

        <!-- DataTales -->
        <div class="card shadow mb-4">
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
                    <table class="table table-striped dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Horario</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entrenadors as $entrenador)
                                <tr>
                                    <td>{{ $entrenador->nombre }}</td>
                                    <td>{{ $entrenador->telefono }}</td>
                                    <td>{{ $entrenador->horario }}</td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">

                                                <a href="{{ route('entrenador.show', $entrenador->id) }}"
                                                    class="dropdown-item">Eventos</a>

                                                <a href="{{ route('entrenador.edit', $entrenador) }}"
                                                    class="dropdown-item">Editar</a>
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
