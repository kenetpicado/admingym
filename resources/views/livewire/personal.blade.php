@section('title', 'Personal')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Personal</li>
@endsection

<div class="card">
    <x-header-modal>Personal</x-header-modal>

    <x-modal.create label="Personal">
        <x-input name='entrenador.nombre'></x-input>
        <x-input name='entrenador.telefono' type="number"></x-input>
        <x-input name='entrenador.horario'></x-input>
    </x-modal.create>

    <x-table-head>
        @slot('title')
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Horario</th>
            <th>Eventos</th>
            <th>Editar</th>
        @endslot
        <tbody>
            @foreach ($personal as $persona)
                <tr>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>{{ $persona->horario }}</td>
                    <td>
                        <a href="{{ route('eventos', $persona->id) }}" class="btn btn-primary btn-sm">Eventos</a>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <button type="button" class="dropdown-item"
                                    wire:click="edit({{ $persona->id }})">Editar</button>
                                <button type="button" wire:click="destroy({{ $persona->id }})" class="dropdown-item"
                                    onclick="confirm_delete()">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table-head>
</div>
