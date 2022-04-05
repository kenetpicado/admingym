@extends('layout')

@section('title', 'Editar entrenador')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between m-2">
            <h1 class="h3 mb-0 text-gray-800">Entrenadores</h1>
        </div>

        <!-- form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $entrenador->nombre }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('entrenador.update', $entrenador) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Nombre completo</label>
                            <input type="text" name="nombre" class="form-control is-valid @error('nombre') is-invalid @enderror"
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
                        <div class="form-group col-6">
                            <label>Número de teléfono</label>
                            <input type="number" name="telefono"
                                class="form-control is-valid @error('telefono') is-invalid @enderror" autocomplete="off"
                                value="{{ old('telefono', $entrenador->telefono) }}" placeholder="86006856">
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Horario</label>
                            <input type="text" name="horario" class="form-control is-valid @error('horario') is-invalid @enderror"
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
