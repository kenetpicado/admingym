<!-- Agregar -->
<div class="modal fade" id="agregarEntrenador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar entrenador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('entrenador.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror"
                            autocomplete="off" value="{{ old('nombre') }}" placeholder="Escriba su nombre completo">

                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Número de teléfono</label>
                        <input type="number" name="telefono" id="telefono"
                            class="form-control  @error('telefono') is-invalid @enderror" autocomplete="off"
                            value="{{ old('telefono') }}" placeholder="86006856">
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Horario</label>
                        <input type="text" name="horario" id="horario" class="form-control  @error('horario') is-invalid @enderror"
                            autocomplete="off" value="{{ old('horario') }}" placeholder="12m-8pm">
                        @error('horario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Elimiar-->
<div class="modal fade" id="eliminarEntrenador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar entrenador</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('entrenador.destroy', $entrenador->id ?? '') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>
                        Esta acción no se puede deshacer.
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- evento-->
<div class="modal fade" id="agregarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar evento</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('evento.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="entrenador_id" value="{{ $entrenador->id ?? '' }}">
                    <div class="form-group">
                        <label>Seleccione un evento</label>
                        <select name="tipo" class="form-control" required>
                            <option selected value="PAGO">REGISTRAR PAGO</option>
                            <option value="INASISTENCIA">INASISTENCIA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Monto C$</label>
                        <input type="number" name="monto" class="form-control  @error('monto') is-invalid @enderror"
                            autocomplete="off" value="{{ old('monto', 0) }}">

                        @error('monto')
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
