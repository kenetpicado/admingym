@section('title', 'Clientes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
@endsection

<div class="card">
    <x-header-modal>Clientes</x-header-modal>

    <x-modal.create label="Cliente">
        <x-input name='nombre'></x-input>
        <x-input name='fecha' type='date' label='Fecha de nacimiento'></x-input>

        <div class="form-group">
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
    </x-modal.create>

    <x-modal.pagar label="{{ $nombre }}">
        <x-select-0 name="servicio">
            <option value="PESAS">PESAS</option>
            <option value="ZUMBA">ZUMBA</option>
            <option value="SPINNING">SPINNING</option>
            <option value="ZUMBA+PESAS">ZUMBA+PESAS</option>
        </x-select-0>

        <x-select-0 name="plan">
            <option value="MENSUAL">MENSUAL</option>
            <option value="QUINCENAL">QUINCENAL</option>
            <option value="SEMANAL">SEMANAL</option>
            <option value="DIA">DIA</option>
        </x-select-0>

        <x-input name='beca' type='number' val="0"></x-input>
        <x-input name='created_at' type='date' :val="date('Y-m-d')" label="Inicia"></x-input>
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
                            <i class="fas fa-check-circle fa-sm text-success"></i>
                        @else
                            <i class="fas fa-circle fa-sm text-secondary"></i>
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
                        <button wire:click="edit({{ $cliente->id }})" class="btn btn-sm btn-secondary">Editar</button>
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
