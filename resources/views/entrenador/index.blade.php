@extends('layout')

@section('title', 'Personal')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Personal</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-modal>Personal</x-header-modal>

        <x-modal title="Personal" route="personal.store">
            <x-input name='nombre'></x-input>
            <x-input name='telefono' type="number"></x-input>
            <x-input name='horario'></x-input>
        </x-modal>

        <x-table-head>
            <x-slot name='title'>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Horario</th>
                <th>Eventos</th>
                <th>Editar</th>
            </x-slot>
            <tbody>
                @foreach ($entrenadors as $entrenador)
                    <tr>
                        <td>{{ $entrenador->id }}</td>
                        <td>{{ $entrenador->nombre }}</td>
                        <td>{{ $entrenador->telefono }}</td>
                        <td>{{ $entrenador->horario }}</td>
                        <td>
                            <a href="{{ route('personal.show', $entrenador->id) }}"
                                class="btn btn-primary btn-sm">Eventos</a>
                        </td>
                        <td>
                            <a href="{{ route('personal.edit', $entrenador) }}" class="btn btn-secondary btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
    </div>
@endsection
