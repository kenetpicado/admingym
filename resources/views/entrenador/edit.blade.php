@extends('layout')

@section('title', 'Editar entrenador')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Editar entrenador</h4>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('entrenador.update', $entrenador) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre completo</label>
                                            <input type="text" name="nombre" class="form-control" required maxlength="50" autocomplete="off"
                                            value="{{$entrenador->nombre}}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Número de teléfono</label>
                                            <input type="text" name="telefono" class="form-control" maxlength="8" required autocomplete="off"
                                            value="{{$entrenador->telefono}}"
                                            onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Horario</label>
                                            <input type="text" name="horario" class="form-control" required autocomplete="off" maxlength="30"
                                            value="{{$entrenador->horario}}">
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
