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
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                Pesos del cliente: {{ $cliente->nombre }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                        <button wire:click="edit({{ $peso->id }})" class="btn btn-secondary btn-sm">Editar</button>
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
