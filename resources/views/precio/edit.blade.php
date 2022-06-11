@extends('layout')

@section('title', 'Pagar')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('precios.index') }}">Precios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cambiar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$precio->servicio}} - {{$precio->plan}}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('precios.update', $precio) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Monto</label>
                            <input type="number" name="monto" class="form-control @error('monto') is-invalid @enderror"
                                autocomplete="off" value="{{ old('monto', $precio->monto) }}" autofocus>
                            @error('monto')
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
