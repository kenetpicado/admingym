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
        @endslot
        <tbody>
            @forelse ($registros as $registro)
                <tr>
                    <td>
                        <span class="text-muted small">
                            {{ $registro->format_created_at }}
                        </span>
                        <div class="my-1 text-dark break-45-ch">
                            {{ $registro->concepto }}
                        </div>
                    </td>
                    <td>{{ $registro->descripcion }}</td>
                    <td>
                        C$ {{ $registro->monto }}
                        @if($registro->beca > 0)
                            (Beca C$ {{ $registro->beca }})
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
    </x-table-head>
</div>
