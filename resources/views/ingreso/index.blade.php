@extends('layout')

@section('title', 'Ingresos')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Ingresos</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-modal>Ingresos</x-header-modal>

        <x-modal title="Ingreso" route="ingresos.store">
            <x-input-list name='concepto' list="ingresos-categorias"></x-input-list>
            <x-input name='descripcion' text="Descripción"></x-input>
            <x-input name='monto'></x-input>
            <x-input name='created_at' type='date' label="Fecha" :val="date('Y-m-d')"></x-input>
            <x-cat-ingresos></x-cat-ingresos>
        </x-modal>

        <x-table-head>
            <div class="card-title">
                <a href="{{ route('ingresos.rango') }}" class="p-2">Consulta por rango de fechas</a>
                <a href="{{ route('ingresos.categorias') }}" class="p-2">Consulta por categorias</a>
            </div>

            <x-slot name='title'>
                <th>Concepto</th>
                <th>Descripcion</th>
                <th>Monto</th>
                <th>Beca</th>
                <th>Fecha</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @foreach ($ingresos as $ingreso)
                    <tr>
                        <td>{{ $ingreso->concepto }}</td>
                        <td>{{ $ingreso->descripcion }}</td>
                        <td>C$ {{ $ingreso->monto }}</td>
                        <td>C$ {{ $ingreso->beca }}</td>
                        <td>{{ $ingreso->created_at }}</td>
                        <td>
                            <a href="{{ route('ingresos.edit', $ingreso->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
        <div class="mx-auto small">
            {!! $ingresos->links() !!}
        </div>
    </div>
@endsection
