@extends('layout')

@section('title', 'Rango')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('ingresos.index') }}">Ingresos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rango</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Rango</x-header-0>

        <div class="row justify-content-center mb-4">
            <div class="col-lg-6">
                <div class="card-body">
                    <form action="{{ route('ingresos.getrango') }}" method="POST">
                        @csrf
                        <x-input name='inicio' type='date'></x-input>
                        <x-input name='fin' type='date' :val="date('Y-m-d')"></x-input>
                        <button type="submit" class="btn btn-primary btn-sm float-right">Ver</button>
                    </form>
                </div>
            </div>
        </div>
        @if (session('total'))
            <div class="card-body">
                Se han encontrado {{ count(session('ingresos')) }} registros con un total de C$ {{ session('total') }}
            </div>
        @endif

        <x-table-head>
            <x-slot name='title'>
                <th>Concepto</th>
                <th>Descripcion</th>
                <th>Monto</th>
                <th>Beca</th>
                <th>Fecha</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @if (session('ingresos'))
                    @foreach (session('ingresos') as $ingreso)
                        <tr>
                            <td>{{ $ingreso->concepto }}</td>
                            <td>{{ $ingreso->descripcion }}</td>
                            <td>C$ {{ $ingreso->monto }}</td>
                            <td>C$ {{ $ingreso->beca }}</td>
                            <td>{{ $ingreso->created_at }}</td>
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
                        <th colspan="2">Total</td>
                        <th colspan="4">C$ {{ session('total') }}</th>
                    </tr>
                </tfoot>
            @endif
        </x-table-head>
    </div>
@endsection
