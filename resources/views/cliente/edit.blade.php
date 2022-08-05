@extends('layout')

@section('title', 'Editar cliente')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('contenido')
    <div class="card">
        <x-header-0>Editar</x-header-0>

        <x-edit-form ruta='clientes.update' :id="$cliente->id">
            <x-input name='nombre' :val="$cliente->nombre"></x-input>
            <x-input name='fecha' :val="$cliente->fecha" type='date' label='Fecha de nacimiento'></x-input>

            <div class="form-group">
                <div class="custom-control custom-radio custom-control-inline ">
                    <input type="radio" id="customRadioInline1" name="sexo" class="custom-control-input" value="M"
                        {{ $cliente->sexo == 'M' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customRadioInline1">Masculino</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="sexo" class="custom-control-input"
                        value="F" {{ $cliente->sexo == 'F' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customRadioInline2">Femenino</label>
                </div>
            </div>
        </x-edit-form>
    </div>
@endsection
