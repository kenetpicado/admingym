@extends('layout')

@section('title', 'Egresos')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Egresos</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-modal>Egresos</x-header-modal>

        <x-modal title="Egreso" route="egresos.store">
            <x-input-list name='concepto' list="egresos-categorias"></x-input-list>
            <x-input name='descripcion' text="Descripción"></x-input>
            <x-input name='monto'></x-input>
            <x-input name='created_at' type='date' label="Fecha" :val="date('Y-m-d')"></x-input>
            <x-cat-egresos></x-cat-egresos>
        </x-modal>

        <x-table-head>
            <div class="card-title">
                <a href="{{route('egresos.rango')}}" class="p-2">Consulta por rango de fechas</a>
                <a href="{{route('egresos.categorias')}}" class="p-2">Consulta por categorias</a>
            </div>

            <x-slot name='title'>
                <th>Concepto</th>
                <th>Descripcion</th>
                <th>Monto C$</th>
                <th>Fecha</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @foreach ($egresos as $egreso)
                    <tr>
                        <td>{{ $egreso->concepto }}</td>
                        <td>{{ $egreso->descripcion }}</td>
                        <td>{{ $egreso->monto }}</td>
                        <td>{{ $egreso->created_at }}</td>
                        <td>
                            <a href="{{ route('egresos.edit', $egreso->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
        <div class="mx-auto small">
            {!! $egresos->links() !!}
        </div>
    </div>

@endsection
