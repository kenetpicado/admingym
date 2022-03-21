@extends('layout')

@section('title', 'Editar')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">EDITAR CLIENTE</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('cliente.update', $cliente) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre completo</label>
                                            <input type="text" name="nombre" class="form-control is-valid @error('nombre') is-invalid @enderror"
                                                value="{{ old('nombre', $cliente->nombre) }}" autocomplete="off">
                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-lg-3">
                                            <label>Número de teléfono</label>
                                            <input type="number" name="telefono" class="form-control is-valid @error('telefono') is-invalid @enderror" autocomplete="off"
                                                value="{{ old('telefono', $cliente->telefono) }}">
                                            @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" name="fecha" class="form-control is-valid @error('fecha') is-invalid @enderror" autocomplete="off"
                                                value="{{ old('fecha', $cliente->fecha) }}">
                                            @error('fecha')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label>Sexo</label>
                                            <select name="sexo" class="form-control is-valid">
                                                <option value="M" @php
                                                    if ($cliente->sexo == 'M') {
                                                        echo 'selected';
                                                    }
                                                @endphp>M</option>
                                                <option @php
                                                    if ($cliente->sexo == 'F') {
                                                        echo 'selected';
                                                    }
                                                @endphp value="F">F</option>
                                            </select>
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
