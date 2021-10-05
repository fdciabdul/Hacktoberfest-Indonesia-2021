<div class="custom-control custom-checkbox {{ $classDiv ?? '' }}">
    <input
        class="custom-control-input {{ $classInput ?? '' }} @isset($inline) form-check-inline @endisset @error($name) is-invalid @enderror"
        type="checkbox"
        name="{{ $name }}"
        @isset($value) value="{{ isset($value) && $value != '' ? $value : old($name) }}" @endisset
        @isset($checked) @if($value==$checked) checked @endif @endisset
        @isset($id) id="{{ $id }}" @endisset
        @isset($readonly) readonly @endisset
        @isset($disabled) disabled @endisset
        @isset($required) required @endisset>
    <label class="custom-control-label nb-form__label__checkbox" @isset($id) for="{{ $id }}" @endisset>
        {!! $label !!}
    </label>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
