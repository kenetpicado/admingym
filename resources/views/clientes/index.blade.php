@extends('layout')

@section('title', 'Todos')

@section('contenido')
<div class="content-body">
    <div class="container-fluid">
        @if (session('info')) 
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>{{session('info')}}</h4>
                    </div>
                </div>
            </div> 
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
                                        <th>Telefono</th>
                                        <th>Edad</th>
                                        <th>Sexo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{$cliente->id}}</td>
                                        <td>{{$cliente->nombre}}</td>
                                        <td>{{$cliente->telefono}}</td>
                                        <td>{{$cliente->edad}}</td>
                                        <td>{{$cliente->sexo}}</td>
                                        <td style="text-align: center;"><a href="{{route('clientes.edit', $cliente)}}" class="btn btn-outline-primary">Editar</a></td>
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
