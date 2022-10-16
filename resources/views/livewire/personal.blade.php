@section('title', 'Personal')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Personal</li>
@endsection

<div class="card">
    <x-header-modal>Personal</x-header-modal>

    <x-modal.create label="Personal">
        <x-input name='nombre'></x-input>
        <x-input name='telefono' type="number"></x-input>
        <x-input name='horario'></x-input>
    </x-modal.create>

    <x-table-head>
        @slot('header')
        @endslot

        @slot('title')
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Horario</th>
            <th>Eventos</th>
            <th>Editar</th>
        @endslot

        <tbody>
            @foreach ($personal as $persona)
                <tr>
                    <td>{{ $persona->id }}</td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>{{ $persona->horario }}</td>
                    <td>
                        <a href="{{ route('eventos', $persona->id) }}" class="btn btn-primary btn-sm">Eventos</a>
                    </td>
                    <td>
                        <button wire:click="edit({{ $persona->id }})" class="btn btn-secondary btn-sm">Editar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @slot('links')
        @endslot
    </x-table-head>
</div>
