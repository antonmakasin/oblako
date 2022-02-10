<div class="form-group form-check{{ $errors->has($name) ? ' is-error' : '' }} {{ $form_group_class ?? '' }}">
    <input type="hidden" name="{{ $name }}" value="">
    <input
            type="{{ isset($field_type) ? $field_type : 'checkbox' }}"
            name="{{ $name }}"
            id="field_{{ $name }}"
            class="form-check-input @if(!empty($class)) {{ $class }} @endif"
            value="1"
            @if($value || old($name)) checked @endif
    >
    @if(isset($title))
        <label for="field_{{ $name }}">{{ $title }}</label>
    @endif
    @if ($errors->has($name))
        <small class="form-text text-muted">{{ $errors->first($name) }}</small>
    @endif
</div>
