@section('title', 'Contabilidad')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Contabilidad</li>
@endsection

<div class="card">
    <x-header-modal>Contabilidad</x-header-modal>

    <x-modal.create label="Registro">
        <x-input name='concepto'></x-input>
        <x-input name='descripcion' text="Descripción"></x-input>
        <x-input name='monto'></x-input>
        <x-input name='created_at' type='date' label="Fecha"></x-input>
    </x-modal.create>

    <x-table-head>
        @slot('header')
            <div class="row mb-3">
                <div class="col-3">
                    <select class="form-control" role="search" wire:model="table">
                        <option value="ingresos">INGRESOS</option>
                        <option value="egresos">EGRESOS</option>
                    </select>
                </div>
                <div class="col-3">
                    <input type="date" class="form-control " wire:model="start">
                </div>
                <div class="col-3">
                    <input type="date" class="form-control " wire:model="end">
                </div>

            </div>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                De {{ $start }} hasta {{ $end }} se han encontrado {{ $registros->count() }}
                {{ $table }} con un total de
                C$ {{ $registros->sum('monto') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endslot
        @slot('title')
            <th>Concepto</th>
            <th>Descripcion</th>
            <th>Monto C$</th>
            <th>Fecha</th>
            <th>Editar</th>
        @endslot
        <tbody>
            @forelse ($registros as $registro)
                <tr>
                    <td>{{ $registro->concepto }}</td>
                    <td>{{ $registro->descripcion }}</td>
                    <td>{{ $registro->monto }}</td>
                    <td>{{ $registro->created_at }}</td>
                    <td>
                        <button wire:click="edit({{ $registro->id }})" class="btn btn-secondary btn-sm">Editar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
        @slot('links')
        @endslot
    </x-table-head>
</div>
