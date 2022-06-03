@extends('layout')

@section('title', 'Editar peso')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.show', $peso->cliente_id) }}">Pesos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDITAR PESO</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pesos.update', $peso->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Peso en libras</label>
                            <input type="text" name="peso" class="form-control @error('peso') is-invalid @enderror"
                                autocomplete="off" value="{{ old('peso', $peso->peso) }}">
                            @error('peso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label>Fecha</label>
                            <input type="date" name="created_at"
                                class="form-control @error('created_at') is-invalid @enderror" autocomplete="off"
                                value="{{ old('created_at', $peso->created_at) }}">
                            @error('created_at')
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
@endsection('contenido')
