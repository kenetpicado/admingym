@props(['label'])

<div wire:ignore.self class="modal" id="pagarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pagar - {{ $label }}</h5>
                <button type="button" class="close"  wire:click="resetInputFields()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="pagar_store()">
                @csrf
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="d-none" id="close-pagar-modal" data-dismiss="modal"></button>
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">Pagar</button>
                </div>
            </form>
        </div>
    </div>
</div>
