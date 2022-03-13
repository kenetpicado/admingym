@extends('layout')

@section('title', 'Entrenadores')

@section('contenido')
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
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
                                        <td>{{$entrenador->nombre}}</td>
                                        <td>{{$entrenador->telefono}}</td>
                                        <td>{{$entrenador->horario}}</td>
                                        <td style="text-align: center;">
                                            <a href="{{route('entrenador.edit', $entrenador)}}" class="btn btn-outline-primary">Editar</a>
                                            <a href="{{route('entrenador.show', $entrenador)}}" class="btn btn-primary">Ver detalles</a>
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
