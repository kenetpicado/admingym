@section('title', 'Pesos')

@section('bread')
    <li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pesos</li>
@endsection

<div class="card">
    <x-header-modal>Pesos</x-header-modal>

    <x-modal.create label="Peso">
        <x-input name='peso' label='Peso en libras'></x-input>
        <x-input name='created_at' type="date" label='Fecha de registro'></x-input>
    </x-modal.create>

    <x-table-head>
        @slot('header')
            <div class="alert alert-secondary" role="alert">
                Pesos del cliente: {{ $cliente->nombre }}
            </div>
        @endslot

        @slot('title')
            <th>Peso en libras</th>
            <th>Fecha registro</th>
            <th>Editar</th>
        @endslot

        <tbody>
            @forelse ($pesos as $peso)
                <tr>
                    <td>{{ $peso->peso }} libras</td>
                    <td>{{ $peso->created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <button type="button" class="dropdown-item"
                                    wire:click="edit({{ $peso->id }})">Editar</button>
                                <button type="button" class="dropdown-item"
                                    onclick="delete_element({{ $peso->id }})">Eliminar</button>
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
        @slot('links')
        @endslot
    </x-table-head>
</div>
