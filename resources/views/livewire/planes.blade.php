@section('title', 'Planes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Planes</li>
@endsection

<div class="card">
    <x-header-0>Planes</x-header-0>

    <x-modal.create label="Plan">
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

        <x-input name='beca' type='number'></x-input>
        <x-input name='created_at' type='date' :val="date('Y-m-d')" label="Inicia"></x-input>
        <x-input name='nota'></x-input>

        @error('monto')
            <span class="feedback small" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </x-modal.create>

    <x-table-head>
        @slot('header')
            <div class="card-title">
                <div class="alert alert-danger" role="alert">
                    {{ $registro->status ?? '0' }} nuevos planes expirados.
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <input type="search" class="form-control " wire:model="search" placeholder="Buscar">
                </div>
            </div>
        @endslot
        <x-slot name='title'>
            <th>Cliente</th>
            <th>Servicio</th>
            <th>Plan</th>
            <th>Rango</th>
            <th>Nota</th>
            <th>Editar</th>
        </x-slot>
        <tbody>
            @forelse ($planes as $plan)
                <tr>
                    <td>{{ $plan->cliente_nombre }}</td>
                    <td>{{ $plan->servicio }}</td>
                    <td>{{ $plan->plan }}</td>
                    <td>
                        <div class="badge badge-light">
                            {{ date('d-m-Y', strtotime($plan->created_at)) }}
                        </div>
                        <div class="badge badge-primary">
                            {{ date('d-m-Y', strtotime($plan->fecha_fin)) }}
                        </div>
                    </td>
                    <td>{{ $plan->nota }}</td>
                    <td><button wire:click="edit({{ $plan->id }})" class="btn btn-sm btn-secondary">Editar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay registros</td>
                </tr>
            @endforelse
        </tbody>

        @slot('links')
            {!! $planes->links() !!}
        @endslot
    </x-table-head>

</div>
