@extends('layout')

@section('title', 'Eventos')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('entrenador.index') }}">Entrenadores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Eventos</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-modal>Eventos</x-header-modal>

        <x-modal title="Evento" route="eventos.store">
            <div class="form-group">
                <label>Seleccione un evento</label>
                <select name="tipo" class="form-control" required>
                    <option selected value="PAGO">REGISTRAR PAGO</option>
                    <option value="INASISTENCIA">INASISTENCIA</option>
                </select>
            </div>

            <x-input name='monto' type="number"></x-input>
            <x-input name='nota'></x-input>
            <x-input name='created_at' label="Fecha" type="date" :val="date('Y-m-d')"></x-input>
            <input type="hidden" name="entrenador_id" value="{{ $entrenador_id }}">
        </x-modal>

        <x-table-head>
            <x-slot name='title'>
                <th>Fecha</th>
                <th>Evento</th>
                <th>Monto</th>
                <th>Nota</th>
            </x-slot>
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <td>{{ $evento->created_at }}</td>
                        <td>{{ $evento->tipo}}</td>
                        <td>C$ {{ $evento->monto ?? "-"}}</td>
                        <td>{{ $evento->nota }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-table-head>
    </div>
@endsection
