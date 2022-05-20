@extends('layout')

@section('title', 'Editar cliente')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('clientes.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <!-- form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">EDITAR: {{ $cliente->nombre }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Nombre completo</label>
                            <input type="text" name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror" autocomplete="off"
                                value="{{ old('nombre', $cliente->nombre) }}" placeholder="Escriba su nombre completo">

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Correo</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" autocomplete="off"
                                value="{{ old('email', $cliente->email) }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-3">
                            <label>Fecha de nacimiento</label>
                            <input type="date" name="fecha"
                                class="form-control @error('fecha') is-invalid @enderror" autocomplete="off"
                                value="{{ old('fecha', $cliente->fecha) }}">
                            @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-3">
                            <label>Sexo</label>
                            <select name="sexo" class="form-control" value="{{ old('sexo', $cliente->sexo) }}">
                                @if ($cliente->sexo == 'M')
                                    <option selected value="M">M</option>
                                    <option value="F">F</option>
                                @else
                                    <option value="M">M</option>
                                    <option selected value="F">F</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

    </div>
@endsection('contenido')
