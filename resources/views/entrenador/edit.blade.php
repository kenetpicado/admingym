@extends('layout')

@section('title', 'Editar entrenador')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">EDITAR ENTRENADOR</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('entrenador.update', $entrenador) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre completo</label>
                                            <input type="text" name="nombre"
                                                class="form-control is-valid @error('nombre') is-invalid @enderror"
                                                autocomplete="off" value="{{ old('nombre', $entrenador->nombre) }}">
                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Número de teléfono</label>
                                            <input type="number" name="telefono"
                                                class="form-control is-valid @error('telefono') is-invalid @enderror"
                                                autocomplete="off" value="{{ old('telefono', $entrenador->telefono) }}">

                                            @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Horario</label>
                                            <input type="text" name="horario"
                                                class="form-control is-valid @error('horario') is-invalid @enderror"
                                                autocomplete="off" value="{{ old('horario', $entrenador->horario) }}">
                                            @error('horario')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')
