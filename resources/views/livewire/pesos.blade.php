@section('title', 'Pesos')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pesos</li>
@endsection

<div class="card">
    <x-header-modal>Pesos: {{ $cliente->nombre }}</x-header-modal>

    <x-modal.create label="Peso">
        <x-input name='peso.peso' label='Peso en libras'></x-input>
        <x-input name='peso.created_at' type="date" label='Fecha de registro'></x-input>
    </x-modal.create>

    <x-table-head>
        @slot('title')
            <th>Peso en libras</th>
            <th>Fecha registro</th>
            <th>Editar</th>
        @endslot

        <tbody>
            @forelse ($pesos as $key => $peso)
                <tr>
                    <td>
                        {{ $peso->peso }} libras
                    </td>
                    <td>{{ $peso->format_created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <button type="button" class="dropdown-item"
                                    wire:click="edit({{ $peso->id }})">Editar</button>
                                <button type="button" wire:click="destroy({{ $peso->id }})" class="dropdown-item"
                                    onclick="confirm_delete()">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
    </x-table-head>
</div>
