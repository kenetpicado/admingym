@section('title', 'Eventos')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('personal') }}">Personal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Eventos</li>
@endsection

<div class="card">
    <x-header-modal>Eventos</x-header-modal>

    <x-modal.create label="Evento">
        <div class="form-group">
            <label>Seleccione un evento</label>
            <select name="tipo" class="form-control" required wire:model.defer="tipo">
                <option value="PAGO">REGISTRAR PAGO</option>
                <option value="INASISTENCIA">INASISTENCIA</option>
            </select>
        </div>

        <x-input name='monto' type="number"></x-input>
        <x-input name='nota'></x-input>
        <x-input name='created_at' label="Fecha" type="date"></x-input>
    </x-modal.create>

    <x-table-head>
        @slot('header')
            <div class="alert alert-secondary" role="alert">
                Eventos de: {{ $persona->nombre }}
            </div>
        @endslot

        @slot('title')
            <th>Fecha</th>
            <th>Evento</th>
            <th>Monto</th>
            <th>Nota</th>
        @endslot

        <tbody>
            @forelse ($eventos as $evento)
                <tr>
                    <td>{{ $evento->created_at }}</td>
                    <td>{{ $evento->tipo }}</td>
                    <td>C$ {{ $evento->monto ?? '-' }}</td>
                    <td>{{ $evento->nota }}</td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="4">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
        @slot('links')
        @endslot
    </x-table-head>
</div>
