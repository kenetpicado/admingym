@extends('layout')

@section('title', 'Pagar')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">INGRESE LOS DATOS DEL PAGO</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('caja.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>ID</label>
                                            <input type="text" name="cliente_id" class="form-control"
                                                value="{{ $cliente->id }}" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Cliente</label>
                                            <input type="text" name="nombre" class="form-control"
                                                value="{{ $cliente->nombre }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Servicio</label>
                                            <select name="servicio" class="form-control" required>
                                                <option selected value="PESAS">PESAS</option>
                                                <option value="ZUMBA">ZUMBA</option>
                                                <option value="SPINNING">SPINNING</option>
                                                <option value="TAEKWONDO">TAEKWONDO</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Plan</label>
                                            <select name="plan" class="form-control" required>
                                                <option selected value="MENSUAL">MENSUAL</option>
                                                <option value="QUINCENAL">QUINCENAL</option>
                                                <option value="SEMANAL">SEMANAL</option>
                                                <option value="DIA">DIA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Monto C$</label>
                                            <input type="text" name="monto" class="form-control" maxlength="4" required
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Beca (%)</label>
                                            <input type="text" name="beca" class="form-control" maxlength="3"
                                                autocomplete="off" value="0">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nota</label>
                                            <input type="text" name="nota" class="form-control" maxlength="59" autocomplete="off">
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
