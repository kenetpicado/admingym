@section('title', 'Clientes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
@endsection

<div class="card">
    <x-header-modal>Clientes</x-header-modal>

    <x-modal.create label="Cliente">
        <span class="font-weight-bold">Información del Cliente</span>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <x-input name='nombre'></x-input>
            </div>
            <div class="col-lg-6">
                <x-input name='fecha' type='date' label='Fecha de nacimiento'></x-input>
            </div>
        </div>
        <div class="form-group mb-4">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="sexo" class="custom-control-input"
                    wire:model.defer="sexo" value="M">
                <label class="custom-control-label" for="customRadioInline1">Masculino</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="sexo" class="custom-control-input"
                    wire:model.defer="sexo" value="F">
                <label class="custom-control-label" for="customRadioInline2">Femenino</label>
            </div>
        </div>
        <span class="font-weight-bold">Información del Servicio</span>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <x-select-0 name="servicio">
                    <option value="PESAS">PESAS</option>
                    <option value="ZUMBA">ZUMBA</option>
                    <option value="SPINNING">SPINNING</option>
                    <option value="ZUMBA+PESAS">ZUMBA+PESAS</option>
                </x-select-0>
            </div>
            <div class="col-lg-6">
                <x-select-0 name="plan">
                    <option value="MENSUAL">MENSUAL</option>
                    <option value="QUINCENAL">QUINCENAL</option>
                    <option value="SEMANAL">SEMANAL</option>
                    <option value="DIA">DIA</option>
                </x-select-0>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-input name='beca' type='number' val="0"></x-input>
            </div>
            <div class="col-lg-6">
                <x-input name='created_at' type='date' :val="date('Y-m-d')" label="Inicia"></x-input>
            </div>
        </div>

        <x-input name='nota'></x-input>

        @error('monto')
            <span class="feedback small" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </x-modal.create>

    <x-modal.pagar label="{{ $nombre }}">
        <div class="row">
            <div class="col-lg-6">
                <x-select-0 name="servicio">
                    <option value="PESAS">PESAS</option>
                    <option value="ZUMBA">ZUMBA</option>
                    <option value="SPINNING">SPINNING</option>
                    <option value="ZUMBA+PESAS">ZUMBA+PESAS</option>
                </x-select-0>
            </div>
            <div class="col-lg-6">
                <x-select-0 name="plan">
                    <option value="MENSUAL">MENSUAL</option>
                    <option value="QUINCENAL">QUINCENAL</option>
                    <option value="SEMANAL">SEMANAL</option>
                    <option value="DIA">DIA</option>
                </x-select-0>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <x-input name='beca' type='number' val="0"></x-input>
            </div>
            <div class="col-lg-6">
                <x-input name='created_at' type='date' :val="date('Y-m-d')" label="Inicia"></x-input>
            </div>
        </div>

        <x-input name='nota'></x-input>

        @error('monto')
            <span class="feedback small" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </x-modal.pagar>

    <x-table-head>
        @slot('header')
            <div class="row">
                <div class="col-3">
                    <input type="search" class="form-control " wire:model="search" placeholder="Buscar">
                </div>
            </div>
        @endslot

        @slot('title')
            <th>ID</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Pagar</th>
            <th>Pesos</th>
            <th>Editar</th>
        @endslot

        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td data-title="ID">{{ $cliente->id }}</td>
                    <td data-title="Nombre">
                        @if ($cliente->planes_count > 0)
                            <i class="fas fa-circle fa-sm mr-2 text-success"></i>
                        @else
                            <i class="fas fa-circle fa-sm mr-2 text-secondary"></i>
                        @endif
                        {{ $cliente->nombre }}
                    </td>
                    <td data-title="Sexo">{{ $cliente->sexo }}</td>
                    <td>
                        <button wire:click="pagar({{ $cliente->id }})" class="btn btn-sm btn-primary">Pagar</button>
                    </td>
                    <td>
                        <a href="{{ route('pesos', $cliente->id) }}" class="btn btn-sm btn-primary">Pesos</a>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <button type="button" class="dropdown-item"
                                    wire:click="edit({{ $cliente->id }})">Editar</button>
                                <button type="button" class="dropdown-item"
                                    onclick="delete_element({{ $cliente->id }})">Eliminar</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
        @slot('links')
            {!! $clientes->links() !!}
        @endslot
    </x-table-head>
</div>
