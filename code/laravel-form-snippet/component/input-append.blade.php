<div class="form-group {{ $classDiv ?? '' }} ">
    @isset($label)
        <label @isset($id) for="{{ $id }}" @endisset
        class="col-form-label nb-form__label">
            {{ $label }}
        </label>
    @endisset
    <div class="input-group {{ $inputGroupClass ?? 'mb-3' }}">
        @isset($labelLeft)
            <div class="input-group-prepend">
            <span class="input-group-text">
                {{ $labelLeft }}
            </span>
            </div>
        @endisset

        <input
            type="{{ $type ?? 'text' }}"
            name="{{ $name }}"
            class="form-control nb-form__input  {{ $classInput ?? '' }} {{ $showHideClass ?? '' }} {{ $classAppendRight ?? '' }} @error($name) is-invalid @enderror"
            @isset($id) id="{{ $id }}" @endisset
            {{ (isset($type) && $type=='number') ? 'min=0' : ''}}
            {{ (isset($type) && isset($max) && $type=='number') ? 'max='. $max : '' }}
            placeholder="{{ $placeholder ?? '' }}"
            value="{{ isset($value) && $value != '' ? $value : old($name) }}"
            @isset($readonly) readonly @endisset
            @isset($disabled) disabled @endisset
            @isset($required) required @endisset>

        @isset($labelRight)
            <div class="input-group-prepend">
            <span class="input-group-text {{ $labelRightClass ?? '' }}">
                {!! $labelRight !!}
            </span>
            </div>
        @endisset

        @isset($showHide)
            <div class="input-group-prepend">
                <button class="btn nb__show-hide" type="button" @isset($id) data-target="{{ $id }}" @endisset>
                    <i class="far fa-eye"></i>
                </button>
            </div>
        @endisset

        @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @isset($help)
            <small class="form-text text-muted">{!! $help !!}</small>
        @endisset
    </div>

</div>
