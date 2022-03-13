@extends('layout')

@section('title', 'Crear')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Editar cliente</h4>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nombre completo</label>
                                            <input type="text" name="nombre" class="form-control" required
                                                value="{{ $cliente->nombre }}" autocomplete="off" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Número de teléfono</label>
                                            <input type="text" name="telefono" class="form-control" maxlength="8" required
                                                autocomplete="off" value="{{ $cliente->telefono }}"
                                                onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Edad</label>
                                            <input type="text" name="edad" class="form-control" maxlength="2" required
                                                autocomplete="off" value="{{ $cliente->edad }}"
                                                onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Sexo</label>
                                            <select name="sexo" class="form-control" required>
                                                <option <?php if ($cliente->sexo == 'M') {echo 'selected';}?> value="M">M</option>
                                                <option <?php if ($cliente->sexo == 'F') {echo 'selected';}?> value="F">F</option>
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
