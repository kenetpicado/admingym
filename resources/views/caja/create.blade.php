@extends('layout')

@section('title', 'Caja')

@section('contenido')
    <div class="content-body">
        <div class="container-fluid">
            {{-- SI HAY MENSAJE DE NOTIFICACION --}}
            @if (session('info'))
                <div class="alert alert-primary"><strong>Mensaje:</strong> {{ session('info') }}</div>
            @endif
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">CAJA</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientes as $cliente)
                                            <tr>
                                                <td>{{ $cliente->id }}</td>
                                                <td>{{ $cliente->nombre }}</td>
                                                <td>{{ $cliente->telefono }}</td>
                                                <td>
                                                    <a href="{{ route('pagar', $cliente) }}"
                                                        class="btn btn-outline-primary">Registrar pago</a>
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
