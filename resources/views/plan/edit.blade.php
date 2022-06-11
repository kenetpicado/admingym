@extends('layout')

@section('title', 'Editar plan')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('planes.index') }}">Planes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDITAR PLAN</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('planes.update', $plan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="form-group col-lg-3">
                            <label>Servicio</label>
                            <select name="servicio" class="form-control" required>
                                <option value="PESAS"
                                    {{ old('servicio') == 'PESAS' || $plan->servicio == 'PESAS' ? 'selected' : '' }}>PESAS
                                </option>
                                <option value="ZUMBA"
                                    {{ old('servicio') == 'ZUMBA' || $plan->servicio == 'ZUMBA' ? 'selected' : '' }}>ZUMBA
                                </option>
                                <option value="SPINNING"
                                    {{ old('servicio') == 'SPINNING' || $plan->servicio == 'SPINNING' ? 'selected' : '' }}>
                                    SPINNING
                                </option>
                                <option value="ZUMBA+PESAS"
                                    {{ old('servicio') == 'ZUMBA+PESAS' || $plan->servicio == 'ZUMBA+PESAS' ? 'selected' : '' }}>
                                    ZUMBA+PESAS</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-3">
                            <label>Plan</label>
                            <select name="plan" class="form-control" required>
                                <option value="MENSUAL"
                                    {{ old('plan') == 'MENSUAL' || $plan->plan == 'MENSUAL' ? 'selected' : '' }}>MENSUAL
                                </option>
                                <option value="QUINCENAL"
                                    {{ old('plan') == 'QUINCENAL' || $plan->plan == 'QUINCENAL' ? 'selected' : '' }}>
                                    QUINCENAL
                                </option>
                                <option value="SEMANAL"
                                    {{ old('plan') == 'SEMANAL' || $plan->plan == 'SEMANAL' ? 'selected' : '' }}>SEMANAL
                                </option>
                                <option value="DIA" {{ old('plan') == 'DIA' || $plan->plan == 'DIA' ? 'selected' : '' }}>
                                    DIA</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Beca C$</label>
                            <input type="number" name="beca" class="form-control @error('beca') is-invalid @enderror"
                                autocomplete="off" value="{{ old('beca', $plan->beca) }}">
                            @error('beca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label>Nota (opcional)</label>
                            <input type="text" name="nota" class="form-control @error('nota') is-invalid @enderror"
                                autocomplete="off" value="{{ old('nota', $plan->nota) }}">
                            @error('nota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Inicia</label>
                            <input type="date" name="created_at"
                                class="form-control @error('created_at') is-invalid @enderror" autocomplete="off"
                                value="{{ old('created_at', $plan->created_at) }}">
                            @error('created_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                    <input type="hidden" name="nombre" value="{{ $cliente->nombre }}"> --}}
                    {{-- <input type="hidden" name="email" value="{{ $cliente->email }}"> --}}
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

    </div>
@endsection('contenido')
