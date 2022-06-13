@extends('layout')

@section('title', 'Otro egreso')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('egresos.index') }}">Egresos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDITAR EGRESO</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('egresos.update', $egreso) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Concepto</label>
                            <input type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror"
                                autocomplete="off" value="{{ old('tipo', $egreso->tipo) }}" autofocus>
                            @error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Nota</label>
                            <input type="text" name="nota" class="form-control @error('nota') is-invalid @enderror"
                                autocomplete="off" value="{{ old('nota', $egreso->nota) }}" autofocus>
                            @error('nota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Monto C$</label>
                            <input type="number" name="monto" class="form-control @error('monto') is-invalid @enderror"
                                autocomplete="off" value="{{ old('monto', $egreso->monto) }}">
                            @error('monto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label>Fecha</label>
                            <input type="date" name="created_at"
                                class="form-control @error('created_at') is-invalid @enderror" autocomplete="off"
                                value="{{ old('created_at', $egreso->created_at) }}">
                            @error('created_at')
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
