@props(['name', 'label' => $name, 'type' => 'text', 'val' => ''])

<div class="form-group">
    <label>{{ ucfirst($label) }}</label>
    <input type={{ $type }} class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        wire:model.defer="{{ $name }}">

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
