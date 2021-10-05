<div class="{{$classDiv}}">
    @if($label)
        <div class="col-form-label nb-form__label p-0 mt-3"> {{ $label }} </div>
    @endif
    <div class="my-3 nb__text--gray">
        <span id="{{ $name }}-name-file" class="nb__text--12" data-icon="{{ $icon ?? 'fas fa-file-alt' }}"></span>
    </div>
    <div class="d-flex align-items-center {{isset($classButton) ? $classButton : ''}}">
        <label id="{{ $name }}-upload-btn" for="{{ $name }}" class="nb-btn nb--pink m-0 mr-2">
            <span id="{{ $name }}-wording" data-prefix="{{ $prefix }}"></span>
            @php
                $result = isset($multiple) ? "{$name}[{$multiple}][file_name]" : "{$name}[file_name]";
                $mimeType = isset($multiple) ? "{$name}[{$multiple}][mime_type]" : "{$name}[mime_type]";
                $path = isset($multiple) ? "{$name}[{$multiple}][path]" : "{$name}[path]";
                $directory = isset($multiple) ? "{$name}[{$multiple}][directory]" : "{$name}[directory]";
            @endphp
            <input name="{{$result}}" type="text" id="{{ $name }}-result" hidden>
            <input name="{{$mimeType}}" type="text" id="{{ $name }}-mime-type" hidden>
            <input name="{{$path}}" type="text" id="{{ $name }}-path" hidden>
            <input name="{{$directory}}" type="text" id="{{ $name }}-directory" value="{{$directory}}" hidden>
            <input type="file" id="{{ $name }}" data-url="{{ route('upload-temp') }}"
                   @if($accept) accept="{{ $accept }}" @endif hidden>
        </label>
        <button class="nb-btn nb--outline-red px-4" id="{{ $name }}-delete">Hapus</button>
    </div>
</div>
@push('js')
    <script>
        $(function () {
            nbForm.inputFile('{{ $name }}');
        });
    </script>
@endpush
