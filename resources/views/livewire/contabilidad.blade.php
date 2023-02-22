@section('title', 'Contabilidad')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Contabilidad</li>
@endsection

<div class="card">
    <x-header-modal>Contabilidad</x-header-modal>

    <x-modal.create label="Registro">
        <span>
            Agregando un nuevo registro a la tabla
            <h5 class="font-weight-bold text-uppercase mb-3">{{ $table }}</h5>
        </span>

        <x-input-list name="concepto"></x-input-list>

        @if ($table == 'ingresos')
            <x-cat-ingresos></x-cat-ingresos>
        @else
            <x-cat-egresos></x-cat-egresos>
        @endif

        <x-input name='descripcion' text="Descripción"></x-input>
        <x-input name='monto'></x-input>
        <x-input name='created_at' type='date' label="Fecha"></x-input>
    </x-modal.create>

    <x-table-head>
        @slot('header')
            <div class="row mb-3">
                <div class="col-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-control" role="search" wire:model="table">
                        <option value="ingresos">INGRESOS</option>
                        <option value="egresos">EGRESOS</option>
                    </select>
                </div>
                <div class="col-3">
                    <label class="form-label">Desde</label>
                    <input type="date" class="form-control " wire:model="start">
                </div>
                <div class="col-3">
                    <label class="form-label">Hasta</label>
                    <input type="date" class="form-control " wire:model="end">
                </div>
                <div class="col-3">
                    <label class="form-label">Buscar</label>
                    <input type="search" placeholder="Buscar Concepto" class="form-control" list="categorias"
                        wire:model="search_concepto">
                </div>
            </div>
            <div class="alert alert-primary" role="alert">
                @if($start == $end)
                    Hoy
                @else
                    De {{ date('d-m-Y', strtotime($start)) }}, hasta {{ date('d-m-Y', strtotime($end)) }}
                @endif
                se han encontrado {{ $registros->count() }} {{ $table }}
                con un total de C$ {{ $registros->sum('monto') }}
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
                    <td>C$ {{ $registro->monto }}</td>
                    <td>{{ date('d-m-Y', strtotime($registro->created_at)) }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <button type="button" class="dropdown-item"
                                wire:click="edit({{ $registro->id }})">Editar</button>
                                <button type="button" wire:click="destroy({{ $registro->id }})" class="dropdown-item"
                                    onclick="confirmAction()">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
    </x-table-head>
</div>
