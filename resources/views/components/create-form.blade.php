@props(['ruta', 'title'])

<div class="row justify-content-center mb-4">
    <div class="col-lg-6">
        <div class="card-body">
            <form action="{{ route($ruta) }}" method="POST">
                @csrf

                {{ $slot }}

                <button type="submit" class="btn btn-primary float-right">Guardar</button>
            </form>
        </div>
    </div>
</div>
