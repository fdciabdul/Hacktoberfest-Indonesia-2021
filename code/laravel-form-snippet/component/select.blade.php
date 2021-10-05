<div class="form-group {{ $classDiv ?? '' }} ">
    @isset($label)
        <label
            @isset($id) for="{{ $id }}" @endisset
        @if(isset($inline))
        class="col-form-label nb-form__label {{ $classLabel ?? 'col-md-2' }}"
            @else
            class="col-form-label nb-form__label {{ $classLabel ?? '' }}"
            @endif>
            {{ $label }}
        </label>
    @endisset
    <select
        class="custom-select nb-form__input  {{ $classInput ?? '' }} @error($name)  is-invalid @enderror"
        name="{{ $name }}"
        @isset($id) id="{{ $id }}" @endisset
        @isset($readonly) readonly @endisset
        @isset($disabled) disabled @endisset
        @isset($required) required @endisset
        @isset($multiple) multiple @endisset
        @isset($placeholder) data-placeholder="- Choose -" @endisset
        @isset($url) data-url="{{ $url }}" @endisset
        @isset($value_id) data-id="{{ $value_id }}" @endisset
        @isset($value_name) data-name="{{ $value_name }}" @endisset
    >
        @isset($placeholder)
            <option value="" selected>{{ $placeholder }}</option>
        @endisset

        @isset($options)
            @foreach($options as $index => $option)
                @php
                    /* @var array|object $option */
                    $optionId = data_get($option, 'id');
                    $optionName = data_get($option, 'name', $optionId);
                    $optionClass = data_get($option, 'class');
                    $optionAttribute = data_get($option, 'attributes', []);
                @endphp
                <option
                    name="{{ $name }}"
                    value="{{ $optionId }}"
                    class="{{ $optionClass }}"
                @if(isset($multiple) && $multiple)
                    {{ collect(old($name, $value ?? []))->contains($optionId) ? 'selected' : '' }}
                    @else
                    {{ old($name, $value ?? '') == $optionId ? 'selected' : '' }}
                    @endif
                    {!! html_attribute($optionAttribute) !!}>
                    {{ $optionName }}
                </option>
            @endforeach
        @endisset
    </select>

    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
