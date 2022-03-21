@extends('layout')

@section('title', 'Entrenadores')

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
                            <h4 class="card-title">AGREGAR UN NUEVO ENTRENADOR</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('entrenador.store') }}" method="POST">
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
                                        <div class="form-group col-md-3">
                                            <label>Número de teléfono</label>
                                            <input type="number" name="telefono"
                                                class="form-control  @error('telefono') is-invalid @enderror"
                                                autocomplete="off" value="{{ old('telefono') }}"
                                                placeholder="86006856">
                                            @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Horario</label>
                                            <input type="text" name="horario"
                                                class="form-control  @error('horario') is-invalid @enderror"
                                                autocomplete="off" value="{{ old('horario') }}"
                                                placeholder="12m-8pm">
                                            @error('horario')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Agregar entrenador</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">TODOS LOS ENTRENADORES</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th>Horario</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entrenadors as $entrenador)
                                            <tr>
                                                <td>{{ $entrenador->nombre }}</td>
                                                <td>{{ $entrenador->telefono }}</td>
                                                <td>{{ $entrenador->horario }}</td>
                                                <td>
                                                    <a href="{{ route('entrenador.edit', $entrenador) }}"
                                                        class="btn btn-outline-primary">Editar</a>
                                                    <a href="{{ route('entrenador.show', $entrenador) }}"
                                                        class="btn btn-primary">Ver detalles</a>
                                                </td>
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
