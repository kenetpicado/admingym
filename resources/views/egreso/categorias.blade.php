@extends('layout')

@section('title', 'Categorias')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('egresos.index') }}">Egresos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Categorías</x-header-0>
        <div class="row justify-content-center mb-4">
            <div class="col-lg-6">
                <div class="card-body">
                    <form action="{{ route('egresos.getcategorias') }}" method="POST">
                        @csrf
                        <x-input-list name='categoria' label="Categorías" list="egresos-categorias"></x-input-list>
                        <button type="submit" class="btn btn-primary btn-sm float-right">Ver</button>
                    </form>
                </div>
            </div>
        </div>
        <x-cat-egresos></x-cat-egresos>
        @if (session('total'))
            <div class="card-body">
                Se han encontrado {{ count(session('egresos')) }} registros con un total de C$ {{ session('total') }}
            </div>
        @endif
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
                        <th colspan="2">Total</th>
                        <th colspan="3">C$ {{ session('total') }}</th>
                    </tr>
                </tfoot>
            @endif
        </x-table-head>
    </div>
@endsection
