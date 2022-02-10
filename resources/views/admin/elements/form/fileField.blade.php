<div class="form-group{{ $errors->has($name) ? ' is-error' : '' }}">
    @if(isset($title))
        <label for="field_{{ $name }}">{{ $title }}</label>
    @endif
    @if ($value)
        <p class="mb-2">
            @if ($file_type == 'image')
                <a href="{{ $value }}" data-fancybox="gallery" target="_blank">
                    <img src="{{ $value }}" alt="" style="max-width: 80px; max-height: 80px;">
                </a>
            @else
                <a href="{{ $value }}">{{ $value }}</a>
            @endif
        </p>
    @endif

    <input
            type="file"
            name="{{ $name }}"
            id="field_{{ $name }}"
            class="form-control-file"
            value="@if (old($name)){{ old($name) }}@elseif (!empty($value) || $value === 0){{ $value }}@endif"
            {{ isset($required) && !$value ? ' required' : ''}}
    >

    @if (!empty($caption))
        <small class="form-text text-muted">{{ $caption }}</small>
    @endif

    @if ($errors->has($name))
        <small class="form-text text-muted">{{ $errors->first($name) }}</small>
    @endif
</div>
