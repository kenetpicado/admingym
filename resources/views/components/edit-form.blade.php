@props(['ruta', 'id'])

<div class="row justify-content-center mb-4">
    <div class="col-lg-6">
        <div class="card-body">
            <form action="{{ route($ruta, $id) }}" method="POST">
                @csrf
                @method('PUT')

                {{ $slot }}
                <button type="submit" class="btn btn-primary float-right">Actualizar</button>
            </form>
        </div>
    </div>
</div>
