@extends('layout')

@section('title', 'Categorias')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ingresos.index') }}">Ingresos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorías</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <x-header-1 modelo="Categorías"></x-header-1>

            {{-- FORM GET CATEGORIAS --}}
            <x-modal-add ruta='ingresos.getcategorias' title='Ingresos' act="Categorías">
                <x-input-list label='categoria' text="Categorías" list="ingresos-categorias"></x-input-list>
            </x-modal-add>

            <x-cat-ingresos></x-cat-ingresos>

            {{-- INDEX --}}
            <x-table-head>
                <x-slot name='title'>
                    <th>Concepto</th>
                    <th>Descripcion</th>
                    <th>Monto C$</th>
                    <th>Beca C$</th>
                    <th>Fecha</th>
                    <th>Editar</th>
                </x-slot>
                <tbody>
                    @if (session('ingresos'))
                        @foreach (session('ingresos') as $ingreso)
                            <tr>
                                <td>{{ $ingreso->nombre }}</td>
                                <td>{{ $ingreso->servicio }}</td>
                                <td>{{ $ingreso->monto }}</td>
                                <td>
                                    @if ($ingreso->beca > 0)
                                        {{ $ingreso->beca }}
                                    @endif
                                </td>
                                <td>{{ date('d F Y', strtotime($ingreso->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('ingresos.edit', $ingreso->id) }}"
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
