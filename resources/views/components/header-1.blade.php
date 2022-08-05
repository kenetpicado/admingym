@props(['ruta', 'id' => ''])

<div class="card-header d-flex align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">{{ $slot }}</h6>
    <a class="btn btn-sm btn-primary ml-2" href="{{ route($ruta, $id) }}">Agregar</a>
</div>
