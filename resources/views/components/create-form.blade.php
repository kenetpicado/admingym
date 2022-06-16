@props(['ruta', 'title'])

<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route($ruta) }}" method="POST">
            @csrf

            {{ $slot }}

            <div class="row">
                <div class=" form-group col-lg-6">
                    <button type="submit" class="btn btn-primary float-right">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
