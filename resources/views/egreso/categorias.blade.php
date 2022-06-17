@extends('layout')

@section('title', 'Egresos')

@section('contenido')

    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('egresos.index') }}">Egresos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorías</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <x-header-1 modelo="Categorías"></x-header-1>

            <x-modal-add ruta='egresos.getcategorias' title='Egresos' act="Categorías">
                <x-input-list label="categoria" text="Categorías" list="egresos-categorias"></x-input-list>
            </x-modal-add>
            <x-cat-egresos></x-cat-egresos>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>Concepto</th>
                    <th>Descripcion</th>
                    <th>Monto C$</th>
                    <th>Fecha</th>
                    <th>Editar</th>
                </x-slot>
                <tbody>
                    @if (session('egresos'))
                        @foreach (session('egresos') as $egreso)
                            <tr>
                                <td>{{ $egreso->tipo }}</td>
                                <td>{{ $egreso->nota }}</td>
                                <td>{{ $egreso->monto }}</td>
                                <td>{{ date('d F Y', strtotime($egreso->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('egresos.edit', $egreso->id) }}"
                                        class="btn btn-secondary btn-sm">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                @if (session('total'))
                    <tfoot>
                        <tr>
                            <td colspan="2">Total</td>
                            <td colspan="4">C$ {{ session('total') }}</td>
                        </tr>
                    </tfoot>
                @endif
            </x-table-head>
        </div>
    </div>
@endsection
<x-open-modal></x-open-modal>
