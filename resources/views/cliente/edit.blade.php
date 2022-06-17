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
                <div class="row">
                    <x-input-form label='nombre' class="col-lg-6" :val="$cliente->nombre"></x-input-form>
                </div>
                <div class="row">
                    <x-input-form label='email' class="col-lg-6" :val="$cliente->email" type='email'></x-input-form>
                </div>
                <div class="row">
                    <x-input-form label='fecha' class="col-lg-3" :val="$cliente->fecha" type='date' text='Fecha de nacimiento'>
                    </x-input-form>

                    <div class="form-group col-lg-3">
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
