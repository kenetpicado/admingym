@section('title', 'Eventos')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('personal') }}">Personal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Eventos</li>
@endsection

<div class="card">
    <x-header-modal>Eventos: {{ $entrenador->nombre }}</x-header-modal>

    <x-modal.create label="Evento">
        <div class="form-group">
            <label>Seleccione un evento</label>
            <select name="evento.tipo" class="form-control" required wire:model.defer="evento.tipo">
                <option value="PAGO">PAGO</option>
                <option value="INASISTENCIA">INASISTENCIA</option>
            </select>
        </div>

        <x-input label="Monto" name='evento.monto' type="number"></x-input>
        <x-input label="Nota (Opcional)" name='evento.nota'></x-input>
        <x-input label="Fecha" name='evento.created_at' label="Fecha" type="date"></x-input>
    </x-modal.create>

    <x-table-head>
        @slot('title')
            <th>Evento</th>
            <th>Monto</th>
            <th>Fecha</th>
        @endslot

        <tbody>
            @forelse ($eventos as $evento)
                <tr>
                    <td>
                        {{ $evento->tipo }}
                        @isset($evento->nota)
                            <div class="small text-primary">
                                {{ $evento->nota }}
                            </div>
                        @endisset
                    </td>
                    <td>C$ {{ $evento->monto }}</td>
                    <td>{{ $evento->format_created_at }}</td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="4">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
    </x-table-head>
</div>
