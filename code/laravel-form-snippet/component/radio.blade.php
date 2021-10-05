<div class="custom-control custom-radio {{ $classDiv ?? '' }} @isset($inline) custom-control-inline @endisset">
    <input class="custom-control-input @error($name) is-invalid @enderror"
           type="radio"
           name="{{ $name }}"
           value="{{ isset($value) && $value != '' ? $value : old($name) }}"
           @isset($checked) @if($value==$checked) checked @endif @endisset
           @isset($readonly) readonly @endisset
           @isset($disabled) disabled @endisset
           @isset($required) required @endisset
           @isset($id) id="{{ $id }}" @endisset>
    <label class="custom-control-label nb-form__label__checkbox" @isset($id) for="{{ $id }}" @endisset>
        {!! $label !!}
    </label>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
