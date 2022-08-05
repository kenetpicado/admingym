@extends('layout')

@section('title', 'Editar plan')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('planes.index') }}">Planes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar plan</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Editar plan</x-header-0>

        <x-edit-form ruta="planes.update" :id="$plan->id">
            <x-select-0 name="servicio" :items="$servicios" :old="$plan->servicio"></x-select-0>
            <x-select-0 name="plan" :items="$planes" :old="$plan->plan"></x-select-0>
            <x-input name='beca' type='number' :val="$plan->beca"></x-input>
            <x-input name='created_at' type='date' :val="$plan->created_at" label="Inicia"></x-input>
            <x-input name='nota' :val="$plan->nota" ></x-input>
            <input type="hidden" name="cliente_id" value="{{ $plan->cliente_id }}">
        </x-edit-form>
    </div>
@endsection
