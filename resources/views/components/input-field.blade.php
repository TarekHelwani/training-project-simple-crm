@props(['name', 'label', 'oldValue' => '', 'type' => 'text'])

<div class="form-group">
    <label
            for="{{ $name }}"
            class="required"
    >{{ $label }}</label>
    <input
            type="{{ $type }}"
            class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }} my-2 border border-light"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $oldValue) }}"
            required
    >
    @if($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
    <span class="help-block"></span>
</div>