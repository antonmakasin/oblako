<div class="form-group{{ $errors->has($name) ? ' is-error' : '' }}">
    @if(isset($title))
        <label for="field_{{ $name }}">{{ $title }}</label>
    @endif
    <textarea
            name="{{ $name }}"
            id="field_{{ $name }}"
            class="form-control"
            placeholder="{{ isset($required) ? 'обязательно' : ''}}"
            rows="{{ $rows ?? 10 }}"
            {{ isset($required) ? ' required' : ''}}
            {{ isset($autofocus) ? ' autofocus' : ''}}
            {{ isset($disabled) ? ' disabled' : ''}}
            {{ isset($readonly) ? ' readonly' : ''}}
    >@if (old($name)){{ old($name) }}@elseif (!empty($value)){{ $value }}@endif</textarea>
    @if (!empty($caption))
        <small class="form-text text-muted">{{ $caption }}</small>
    @endif
    @if ($errors->has($name))
        <small class="form-text text-muted">{{ $errors->first($name) }}</small>
    @endif
</div>

@if(!empty($editor_on))
    <script>
        CKEDITOR.replace('field_{{ $name }}', {
            filebrowserUploadUrl: '/admin/files/wysiwyg_upload',
            // чтобы для изображений размеры писались не в style, а в атрибуты. https://ckeditor.com/old/forums/Support/How-to-prevent-CKEditor-4.x-from-setting-image-dimensions-in-styles-rather-that
            extraAllowedContent: 'img[width,height]',
            disallowedContent: 'img{width,height}',
        });
    </script>
@endif
