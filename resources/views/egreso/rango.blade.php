@extends('layout')

@section('title', 'Rango')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('egresos.index') }}">Egresos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rango</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Rango</x-header-0>

        <div class="row justify-content-center mb-4">
            <div class="col-lg-6">
                <div class="card-body">
                    <form action="{{ route('egresos.getrango') }}" method="POST">
                        @csrf
                        <x-input name='inicio' type='date'></x-input>
                        <x-input name='fin' type='date' :val="date('Y-m-d')"></x-input>
                        <button type="submit" class="btn btn-primary float-right">Ver registros</button>
                    </form>
                </div>
            </div>
        </div>

        <x-table-head>
            <x-slot name='title'>
                <th>Concepto</th>
                <th>Descripcion</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @if (session('egresos'))
                    @foreach (session('egresos') as $egreso)
                        <tr>
                            <td>{{ $egreso->concepto }}</td>
                            <td>{{ $egreso->descripcion }}</td>
                            <td>C$ {{ $egreso->monto }}</td>
                            <td>{{ $egreso->created_at }}</td>
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
                        <th colspan="2">Total</td>
                        <th colspan="4">C$ {{ session('total') }}</th>
                    </tr>
                </tfoot>
            @endif
        </x-table-head>
    </div>
@endsection
