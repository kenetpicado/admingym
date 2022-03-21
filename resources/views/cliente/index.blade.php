@extends('layout')

@section('title', 'Todos')

@section('contenido')
<div class="content-body">
    <div class="container-fluid">
        {{-- SI HAY MENSAJE DE NOTIFICACION --}}
        @if (session('info')) 
        <div class="alert alert-primary"><strong>Mensaje:</strong> {{session('info')}}</div>
        @endif
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">TODOS LOS CLIENTES</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Sexo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{$cliente->id}}</td>
                                        <td>{{$cliente->nombre}}</td>
                                        <td>{{$cliente->telefono}}</td>
                                        <td>{{$cliente->fecha}}</td>
                                        <td>{{$cliente->sexo}}</td>
                                        <td><a href="{{route('cliente.edit', $cliente)}}" class="btn btn-outline-primary">Editar</a></td>
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
