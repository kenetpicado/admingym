@extends('layout')

@section('title', 'Editar entrenador')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('entrenador.index')}}">Entrenadores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDITAR: {{ $entrenador->nombre }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('entrenador.update', $entrenador) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Nombre completo</label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                autocomplete="off" value="{{ old('nombre', $entrenador->nombre) }}"
                                placeholder="Escriba su nombre completo">

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Número de teléfono</label>
                            <input type="number" name="telefono"
                                class="form-control @error('telefono') is-invalid @enderror" autocomplete="off"
                                value="{{ old('telefono', $entrenador->telefono) }}" placeholder="86006856">
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Horario</label>
                            <input type="text" name="horario" class="form-control @error('horario') is-invalid @enderror"
                                autocomplete="off" value="{{ old('horario', $entrenador->horario) }}"
                                placeholder="12m-8pm">
                            @error('horario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

    </div>
@endsection('contenido')
