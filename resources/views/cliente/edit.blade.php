@extends('layout')

@section('title', 'Editar cliente')

@section('contenido')
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <x-header-0 text='Editar'></x-header-0>
            \
            <!-- FORM EDIT -->
            <x-edit-form ruta='clientes.update' :id="$cliente->id">
                <x-input-edit label='nombre' :val="$cliente->nombre"></x-input-edit>
                <x-input-edit label='email' :val="$cliente->email" type='email'></x-input-edit>
                <x-input-edit label='fecha' :val="$cliente->fecha" type='date' text='Fecha de nacimiento'>
                </x-input-edit>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Sexo</label>
                        <select name="sexo" class="form-control" value="{{ old('sexo', $cliente->sexo) }}">
                            @if ($cliente->sexo == 'M')
                                <option selected value="M">M</option>
                                <option value="F">F</option>
                            @else
                                <option value="M">M</option>
                                <option selected value="F">F</option>
                            @endif
                        </select>
                    </div>
                </div>
            </x-edit-form>
        </div>
    </div>
@endsection
