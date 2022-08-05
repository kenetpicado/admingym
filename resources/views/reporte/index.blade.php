@extends('layout')

@section('title', 'Reportes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Reportes</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Reportes</x-header-0>

        <x-table-head>
            <div class="card-title">
                <div class="alert alert-danger" role="alert">
                    {{ $registro->status ?? '0' }} nuevos planes expirados.
                </div>
            </div>

            <x-slot name='title'>
                <th>Mensaje</th>
                <th>Fecha expiración</th>
                <th>Renovar</th>
                <th>Eliminar</th>
            </x-slot>
            <tbody>
                @foreach ($reportes as $reporte)
                    <tr>
                        <td>Ha expirado el plan {{ $reporte->mensaje }} de {{ $reporte->cliente_nombre }}</td>
                        <td>{{ $reporte->created_at }}</td>
                        <td>
                            <a href="{{ route('planes.create', $reporte->cliente_id) }}"
                                class="btn btn-primary btn-sm rounded-3">Renovar</a>
                        </td>
                        <td>
                            <form action="{{ route('reportes.destroy', $reporte->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary btn-sm rounded-3">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
    </div>
@endsection
