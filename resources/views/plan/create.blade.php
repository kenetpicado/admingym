@extends('layout')

@section('title', 'Pagar')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('clientes.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pagar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">PAGAR: {{ $cliente->nombre }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('planes.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="form-group col-lg-3">
                            <label>Servicio</label>
                            <select name="servicio" class="form-control" required>
                                <option value="PESAS" {{ old('servicio') == 'PESAS' ? 'selected' : '' }}>PESAS</option>
                                <option value="ZUMBA" {{ old('servicio') == 'ZUMBA' ? 'selected' : '' }}>ZUMBA</option>
                                <option value="SPINNING" {{ old('servicio') == 'SPINNING' ? 'selected' : '' }}>SPINNING</option>
                                <option value="TAEKWONDO" {{ old('servicio') == 'TAEKWONDO' ? 'selected' : '' }}>TAEKWONDO</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-3">
                            <label>Plan</label>
                            <select name="plan" class="form-control" required>
                                <option value="MENSUAL" {{ old('plan') == 'MENSUAL' ? 'selected' : '' }}>MENSUAL</option>
                                <option value="QUINCENAL" {{ old('plan') == 'QUINCENAL' ? 'selected' : '' }}>QUINCENAL</option>
                                <option value="SEMANAL" {{ old('plan') == 'SEMANAL' ? 'selected' : '' }}>SEMANAL</option>
                                <option value="DIA" {{ old('plan') == 'DIA' ? 'selected' : '' }}>DIA</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Monto C$</label>
                            <input type="number" name="monto" class="form-control @error('monto') is-invalid @enderror"
                                autocomplete="off" value="{{ old('monto') }}" autofocus>
                            @error('monto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label>Beca (%)</label>
                            <input type="number" name="beca" class="form-control @error('beca') is-invalid @enderror"
                                autocomplete="off" value="{{ old('beca', '0') }}">
                            @error('beca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Nota (opcional)</label>
                            <input type="text" name="nota" class="form-control @error('nota') is-invalid @enderror"
                                autocomplete="off">
                            @error('nota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                    <input type="hidden" name="nombre" value="{{ $cliente->nombre }}">
                    <input type="hidden" name="email" value="{{ $cliente->email }}">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

    </div>
@endsection('contenido')
