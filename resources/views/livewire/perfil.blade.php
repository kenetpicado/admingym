@section('title', 'Perfil')

<div class="card">
    <x-header-0>Perfil</x-header-0>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card-body">
                <form wire:submit.prevent="store()">
                    <x-input name="users.name" label="Nombre"></x-input>
                    <x-input name="users.username" label="Usuario"></x-input>
                    <button wire:loading.attr="disabled" type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>

            {{-- <div class="card-body">
                <form wire:submit.prevent="store()">
                    <x-input name="password" label="Cambiar contrasena" type="password"></x-input>
                    <x-input name="password_confirmation" label="Confirmar contrasena" type="password"></x-input>
                </form>
            </div> --}}
        </div>
    </div>
</div>
