@extends('layout')

@section('title', 'Ver detalles')

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
                            <h4 class="card-title">ENTRENADOR: {{ $entrenador->nombre }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('evento.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Seleccione un evento</label>
                                            <select name="tipo" class="form-control" required>
                                                <option selected value="PAGO">REGISTRAR PAGO</option>
                                                <option value="INASISTENCIA">INASISTENCIA</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Monto C$</label>
                                            <input type="number" name="monto"
                                                class="form-control  @error('monto') is-invalid @enderror"
                                                autocomplete="off" value="{{ old('monto', 0) }}">

                                            @error('monto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <input type="hidden" name="entrenador_id" value="{{ $entrenador->id }}">
                                    <button type="submit" class="btn btn-outline-primary">Agregar evento</button>
                                </form>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Evento</th>
                                            <th>Monto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eventos as $evento)
                                            <tr>
                                                <td>{{ $evento->fecha }}</td>
                                                <td>
                                                    @php
                                                        if ($evento->tipo == 'PAGO') {
                                                            echo "<div class='alert alert-primary'>Se ha registrado: $evento->tipo</div>";
                                                        } else {
                                                            echo "<div class='alert alert-danger'>Se ha registrado: $evento->tipo</div>";
                                                        }
                                                    @endphp
                                                <td>{{ $evento->monto }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')
