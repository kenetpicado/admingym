@extends('layout')

@section('title', 'Precios')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Precios</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Precios</x-header-0>

        <x-table-head>
            <x-slot name='title'>
                <th>#</th>
                <th>Servicio</th>
                <th>Plan</th>
                <th>Precio</th>
                <th>Opcion</th>
            </x-slot>
            <tbody>
                @foreach ($precios as $key => $precio)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $precio->servicio }}</td>
                        <td>{{ $precio->plan }}</td>
                        <td>C$ {{ $precio->monto }}</td>
                        <td>
                            <a href="{{ route('precios.edit', $precio->id) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
    </div>
@endsection
