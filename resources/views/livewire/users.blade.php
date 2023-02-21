@section('title', 'Usuarios')

@section('bread')
    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
@endsection

<div class="card">
    <x-header-modal>Usuarios</x-header-modal>

    <x-modal.create label="Agregar Usuario">
        <x-input name='user.name' label="Nombre" type="email"></x-input>
        <x-input name='user.email' label="Email" type="email" ></x-input>
        <x-select-0 label="Rol" name="user_roles">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </x-select-0>
    </x-modal.create>

    <x-table-head>
        @slot('title')
            <th>Usuario</th>
            <th>Rol</th>
        @endslot
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    <div class="text-dark mb-2">
                        {{ $user->name }}
                    </div>
                    <span class="text-primary">{{ $user->email }}</span>
                </td>
                <td class="text-uppercase">{{ $user->role_name }}</td>
            </td>
        </tr>
        @endforeach
    </tbody>
</x-table-head>
</div>
