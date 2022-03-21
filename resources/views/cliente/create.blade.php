@extends('layout')

@section('title', 'Clientes')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">

            {{-- SI HAY MENSAJE DE NOTIFICACION --}}
            @if (session('info'))
                <div class="alert alert-primary"><strong>Mensaje:</strong> {{ session('info') }}</div>
            @endif

            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">AGREGAR UN NUEVO CLIENTE</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('cliente.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre completo</label>
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                autocomplete="off" value="{{ old('nombre') }}"
                                                placeholder="Escriba su nombre completo">

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
                                            <input type="number" name="telefono"
                                                class="form-control @error('telefono') is-invalid @enderror"
                                                autocomplete="off" value="{{ old('telefono') }}" placeholder="86006856">
                                            @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" name="fecha"
                                                class="form-control @error('fecha') is-invalid @enderror" autocomplete="off"
                                                value="{{ old('fecha') }}">
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
                                            <select name="sexo" class="form-control" value="{{ old('sexo') }}">
                                                <option selected value="M">M</option>
                                                <option value="F">F</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')
