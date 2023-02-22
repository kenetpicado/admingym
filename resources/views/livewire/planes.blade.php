@section('title', 'Planes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Planes</li>
@endsection

<div class="card">
    <x-header-0>Planes</x-header-0>

    <x-modal.create label="Plan">
        <x-select-0 label="Servicio" name="plan.servicio">
            <option value="PESAS">PESAS</option>
            <option value="ZUMBA">ZUMBA</option>
            <option value="SPINNING">SPINNING</option>
            <option value="ZUMBA+PESAS">ZUMBA+PESAS</option>
        </x-select-0>

        <x-select-0 label="Plan" name="plan.plan" id="plan">
            <option value="MENSUAL">MENSUAL</option>
            <option value="QUINCENAL">QUINCENAL</option>
            <option value="SEMANAL">SEMANAL</option>
            <option value="DIA">DIA</option>
        </x-select-0>

        <x-input label="Beca" name='plan.beca' type='number'></x-input>
        <x-input label="Inicia" name='plan.created_at' type='date'></x-input>

        <x-input label="Nota (Opcional)" name='plan.nota'></x-input>

        @error('plan.monto')
            <span class="feedback small" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
        <div class="alert alert-primary" role="alert">
            <small>
            Los ingresos creados con fecha anterior a 11-01-2023 no pueden ser sincronizados automaticamente al editar su plan.
            </small>
      </div>
    </x-modal.create>

    <x-table-head>
        @slot('header')
            <div class="card-title">
                <div class="alert alert-danger" role="alert">
                    {{ $plansExpiredCount ?? '0' }} nuevos planes expirados.
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
            <th>Editar</th>
        </x-slot>
        <tbody>
            @forelse ($planes as $plan)
                <tr>
                    <td>
                        {{ $plan->cliente_nombre }}
                        @isset($plan->nota)
                            <div class="small text-primary">
                                {{ $plan->nota }}
                            </div>
                        @endisset
                    </td>
                    <td class="text-primary">{{ $plan->servicio }}</td>
                    <td class="text-primary">{{ $plan->plan }}</td>
                    <td>
                        <div class="badge badge-light">
                            {{ date('d-m-Y', strtotime($plan->created_at)) }}
                        </div>
                        <div class="badge badge-primary">
                            {{ date('d-m-Y', strtotime($plan->fecha_fin)) }}
                        </div>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <button type="button" class="dropdown-item"
                                    wire:click="edit({{ $plan->id }})">Editar</button>

                                <button type="button" wire:click="destroy({{ $plan->id }})" class="dropdown-item"
                                    onclick="confirm_delete()">
                                    Eliminar
                                </button>
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
            {!! $planes->links() !!}
        @endslot
    </x-table-head>
</div>
