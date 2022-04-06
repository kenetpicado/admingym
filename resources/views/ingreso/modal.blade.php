<!-- evento-->
<div class="modal fade" id="ver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Consulta personalizada</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('consulta')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>
                        <strong>
                            En esta sección podra consultar los ingresos totales en un rango
                            de fechas especifico. Seleccione la fecha de inicio y fin de la consulta.
                        </strong>

                    </p>
                    <div class="form-group">
                        <label>Fecha inicio</label>
                        <input type="date" name="inicio" class="form-control @error('inicio') is-invalid @enderror"
                            autocomplete="off" value="{{ old('inicio') }}">
                        @error('inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Fecha fin</label>
                        <input type="date" name="fin" class="form-control @error('fin') is-invalid @enderror"
                            autocomplete="off" value="{{ old('fin') }}">
                        @error('fin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </form>
        </div>
    </div>
</div>
