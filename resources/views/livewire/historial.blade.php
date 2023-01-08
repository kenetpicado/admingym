@section('title', 'Historial')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Historial</li>
@endsection

<div class="card">
    <x-header-0>{{ $cliente->nombre }}: Historial</x-header-modal>

    <x-table-head>
        @slot('title')
            <th>Concepto</th>
            <th>Descripcion</th>
            <th>Monto C$</th>
            <th>Beca C$</th>
            <th>Fecha</th>
        @endslot
        <tbody>
            @forelse ($registros as $registro)
                <tr>
                    <td>
                        <i class="fas fa-check text-success"></i>
                        {{ $registro->concepto }}
                    </td>
                    <td>{{ $registro->descripcion }}</td>
                    <td>C$ {{ $registro->monto }}</td>
                    <td>
                        @if($registro->beca > 0)
                            C$ {{ $registro->beca }}
                        @endif
                    </td>
                    <td>{{ date('d-m-Y', strtotime($registro->created_at)) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
    </x-table-head>
</div>
