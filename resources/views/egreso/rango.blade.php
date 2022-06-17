@extends('layout')

@section('title', 'Rango')

@section('contenido')

    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('egresos.index') }}">Egresos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rango</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <x-header-1 modelo="Rango"></x-header-1>

            <x-modal-add ruta='egresos.getrango' title='Egresos' act="Categorías">
                <x-input-form label='inicio' type='date'></x-input-form>
                <x-input-form label='fin' type='date' :val="date('Y-m-d')"></x-input-form>
            </x-modal-add>

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
