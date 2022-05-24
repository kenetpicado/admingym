<!-- evento-->
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AGREGAR</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('egresos.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="tipo" value="{{ $value ?? '' }}">
                    
                    <div class="form-group">
                        <label>Monto C$</label>
                        <input type="number" name="monto" class="form-control  @error('monto') is-invalid @enderror"
                            autocomplete="off" value="{{ old('monto') }}">

                        @error('monto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Fecha</label>
                            <input type="date" name="created_at"
                                class="form-control @error('created_at') is-invalid @enderror" autocomplete="off"
                                value="{{ old('created_at', date('Y-m-d')) }}">
                            @error('created_at')
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