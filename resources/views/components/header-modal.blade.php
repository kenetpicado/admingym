@props(['ruta', 'id' => ''])

<div class="card-header d-flex align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">{{ $slot }}</h6>
    <button type="button" id="open-create-modal" class="btn btn-sm btn-primary ml-2" data-toggle="modal" data-target="#createModal">
        Agregar
    </button>
</div>
