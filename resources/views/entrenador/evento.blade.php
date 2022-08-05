@extends('layout')

@section('title', 'Agregar evento')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('entrenador.index') }}">Entrenadores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Eventos</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Agregar</x-header-0>

        <x-create-form ruta='eventos.store'>
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
        </x-create-form>
    </div>
@endsection
