@extends('layout')

@section('title', 'Categorias')

@section('contenido')
    <div class="card">
        <x-header-0>Categorías</x-header-0>
        <div class="row justify-content-center mb-4">
            <div class="col-lg-6">
                <div class="card-body">
                    <form action="{{ route('ingresos.getcategorias') }}" method="POST">
                        @csrf
                        <x-input-list name='categoria' label="Categorías" list="ingresos-categorias"></x-input-list>
                        <button type="submit" class="btn btn-primary float-right">Ver registros</button>
                    </form>
                </div>
            </div>
        </div>
        <x-cat-ingresos></x-cat-ingresos>
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
                        <th colspan="2">Total</th>
                        <th colspan="4">C$ {{ session('total') }}</th>
                    </tr>
                </tfoot>
            @endif
        </x-table-head>
    </div>
@endsection
