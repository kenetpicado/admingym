@section('title', 'Reportes')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Reportes</li>
@endsection

<div class="card">
    <x-header-0>Reportes</x-header-0>

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
            <div class="row mb-3">
                <div class="col-3">
                    <input type="search" class="form-control " wire:model="search" placeholder="Buscar Cliente">
                </div>
            </div>
            <div class="card-title">
                <div class="alert alert-danger" role="alert">
                    {{ $registro->status ?? '0' }} nuevos planes expirados.
                </div>
            </div>
        @endslot

        @slot('title')
            <th>Mensaje</th>
            <th>Fecha expiración</th>
            <th>Renovar</th>
            <th>Eliminar</th>
        @endslot

        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>Ha expirado el plan {{ $reporte->mensaje }} de {{ $reporte->cliente_nombre }}</td>
                    <td>{{ $reporte->created_at }}</td>
                    <td>
                        <button wire:click="pagar({{ $reporte->cliente_id }})"
                            class="btn btn-primary  btn-sm rounded-3">Renovar</button>
                    </td>
                    <td>
                        <button wire:click="delete_reporte({{ $reporte->id }})"
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
