<div class="form-group  {{ $classDiv ?? '' }} @isset($inline) row @endisset">
    @isset($label)
        <label
            @isset($id) for="{{ $id }}" @endisset
        @if(isset($inline))
        class="col-sm-2 col-form-label nb-form__label {{ $classLabel ?? '' }}"
            @else
            class="col-form-label nb-form__label {{ $classLabel ?? '' }}"
            @endif>
            {{ $label }}
        </label>
    @endisset

    @isset($helpTop)
        <small class="form-text text-muted mb-2">{!! $helpTop !!}</small>
    @endisset

    @isset($inline)
        <div class="col-sm-10">
            @endisset
            <input
                type="{{ $type ?? 'text' }}"
                name="{{ $name }}"
                class="form-control nb-form__input  {{ $classInput ?? '' }} @error($name) is-invalid @enderror"
                @isset($id) id="{{ $id }}" @endisset
                {{ (isset($type) && $type=='number') ? 'min=0' : ''}}
                {{ (isset($type) && isset($max) && $type=='number') ? 'max='. $max : '' }}
                placeholder="{{ $placeholder ?? '' }}"
                value="{{ isset($value) && $value != '' ? $value : old($name) }}"
                @isset($readonly) readonly @endisset
                @isset($disabled) disabled @endisset
                @isset($required) required @endisset
                @isset($multiple) multiple @endisset>
            @isset($inline)
        </div>
    @endisset

    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @isset($help)
        <small class="form-text text-muted">{!! $help !!}</small>
    @endisset
</div>
