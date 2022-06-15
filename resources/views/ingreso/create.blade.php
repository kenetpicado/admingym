@extends('layout')

@section('title', 'Otro ingreso')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ingreso.index') }}">Ingresos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agregar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">AGREGAR INGRESO</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('ingreso.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Servicio / Descripción</label>
                            <input type="text" name="servicio" class="form-control @error('servicio') is-invalid @enderror"
                                autocomplete="off" value="{{ old('servicio') }}" autofocus>
                            @error('servicio')
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
                                autocomplete="off" value="{{ old('monto') }}">
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
                                value="{{ old('created_at', date('Y-m-d')) }}">
                            @error('created_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection('contenido')
