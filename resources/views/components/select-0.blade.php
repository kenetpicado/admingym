@props(['name', 'label' => $name, 'items', 'old' => ''])

<div class="form-group">
    <label>{{ ucfirst($label) }}</label>
    <select name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" autofocus>

        <option selected disabled value="">Seleccionar</option>

        @foreach ($items as $item)
            <option value="{{ $item->id }}"
                {{ old($name) == $item->id || $old == $item->id ? 'selected' : '' }}>
                {{ $item->nombre }}
            </option>
        @endforeach

    </select>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
