@extends('layout')

@section('title', 'Agregar entrenador')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">
            @if (session('info'))
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>{{ session('info') }}</h4>
                        </div>
                    </div>
                </div>
            @endif
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">AGREGAR UN NUEVO ENTRENADOR</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('entrenador.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre completo</label>
                                            <input type="text" name="nombre" class="form-control" required maxlength="50" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Número de teléfono</label>
                                            <input type="text" name="telefono" class="form-control" maxlength="8" required autocomplete="off"
                                            onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Horario</label>
                                            <input type="text" name="horario" class="form-control" required autocomplete="off" maxlength="30">
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
