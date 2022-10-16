@section('title', 'Precios')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Precios</li>
@endsection

<div class="card">
    <x-header-0>Precios</x-header-0>

    <x-modal.create label="Precio">
        <p>{{ $servicio }} - {{ $plan }}</p>
        <x-input name='monto' type='number'></x-input>
    </x-modal.create>

    <x-table-head>
        @slot('header')
        @endslot

        @slot('title')
            <th>#</th>
            <th>Servicio</th>
            <th>Plan</th>
            <th>Precio</th>
            <th>Opcion</th>
        @endslot
        <tbody>
            @foreach ($precios as $precio)
                <tr>
                    <td>{{ $precio->id }}</td>
                    <td>{{ $precio->servicio }}</td>
                    <td>{{ $precio->plan }}</td>
                    <td>C$ {{ $precio->monto }}</td>
                    <td>
                        <button wire:click="edit({{ $precio->id }})" class="btn btn-primary btn-sm">
                            Editar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @slot('links')
        @endslot
    </x-table-head>
</div>
