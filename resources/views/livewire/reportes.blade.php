@section('title', 'Reportes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Reportes</li>
@endsection

<div class="card">
    <x-header-0>Reportes</x-header-0>

    <x-modal.create label="{{ $cliente->nombre ?? ''}}">
        <x-select-0 name="plan.servicio" label="Servicio">
            <option value="PESAS">PESAS</option>
            <option value="ZUMBA">ZUMBA</option>
            <option value="SPINNING">SPINNING</option>
            <option value="ZUMBA+PESAS">ZUMBA+PESAS</option>
        </x-select-0>

        <x-select-0 name="plan.plan" label="Plan">
            <option value="MENSUAL">MENSUAL</option>
            <option value="QUINCENAL">QUINCENAL</option>
            <option value="SEMANAL">SEMANAL</option>
            <option value="DIA">DIA</option>
        </x-select-0>

        <x-input label="Beca" name='plan.beca' type='number' val="0"></x-input>
        <x-input name='plan.created_at' type='date' label="Inicia"></x-input>
        <p class="text-primary">
            La fecha de vecimiento del ultimo plan fue: {{ $created_at ?? ''}}
        </p>
        <x-input label="Nota (Opcional)" name='plan.nota'></x-input>

        @error('plan.monto')
            <span class="feedback small" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
        @enderror
    </x-modal.create>

    <x-table-head>
        @slot('header')
            <div class="row mb-3">
                <div class="col-3">
                    <input type="search" class="form-control" wire:model="search" placeholder="Buscar Cliente">
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary"
                        onclick="confirm('Actualizar la lista planes vencidos?') || event.stopImmediatePropagation()"
                        wire:click="refresh()">
                        Actualizar Lista
                    </button>
                </div>
            </div>
        @endslot

        @slot('title')
            <th>Mensaje</th>
            <th>Plan</th>
            <th>Fecha expiración</th>
            <th>Renovar</th>
            <th>Eliminar</th>
        @endslot

        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>
                        <div>
                            {{ $reporte->cliente_nombre }}
                            <div class="text-primary mt-2">
                                Plan expirado
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ $reporte->mensaje }}
                    </td>
                    <td>{{ $reporte->created_at }}</td>
                    <td>
                        <button wire:click="create({{ $reporte->cliente_id }}, '{{ $reporte->created_at }}')"
                            class="btn btn-primary  btn-sm rounded-3">Renovar</button>
                    </td>
                    <td>
                        <button onclick="confirm_delete()" wire:click="destroy({{ $reporte->id }})"
                            class="btn btn-secondary btn-sm rounded-3">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @slot('links')
            {!! $reportes->links() !!}
        @endslot
    </x-table-head>
</div>
