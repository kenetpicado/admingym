@extends('layout')

@section('title', 'Agregar cliente')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
@endsection

@section('contenido')
    <div class="card">

        <x-header-0>Agregar</x-header-0>

        <x-create-form ruta='clientes.store'>
            <x-input name='nombre'></x-input>
            <x-input name='email' type='email'></x-input>
            <x-input name='fecha' type='date' label='Fecha de nacimiento'></x-input>

            <div class="form-group">
                <div class="custom-control custom-radio custom-control-inline ">
                    <input type="radio" id="customRadioInline1" name="sexo" class="custom-control-input" value="M"
                        checked>
                    <label class="custom-control-label" for="customRadioInline1">Masculino</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="sexo" class="custom-control-input"
                        value="F">
                    <label class="custom-control-label" for="customRadioInline2">Femenino</label>
                </div>
            </div>
        </x-create-form>
    </div>
@endsection
