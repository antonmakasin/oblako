<div class="form-group{{ $errors->has($name) ? ' is-error' : '' }}{{ !empty($form_group_class) ? " $form_group_class" : '' }}" id="form-group_{{ $name }}">
    @if(isset($title))
        <label for="field_{{ $name }}">{{ $title }}</label>
    @endif
    <input
            type="{{ isset($type) ? $type : 'text'}}"
            name="{{ $name }}"
            id="field_{{ $name }}"
            class="form-control"
            placeholder="{{ isset($required) ? 'обязательно' : ($placeholder ?? '') }}"
            value="@if (old($name)){{ old($name) }}@elseif (!empty($value) || $value === 0){{ $value }}@endif"
            {{ isset($required) ? ' required' : ''}}
            {{ isset($autofocus) ? ' autofocus' : ''}}
            {{ isset($disabled) ? ' disabled' : ''}}
            {{ isset($readonly) ? ' readonly' : ''}}
            @if(!empty($step)) step="{{$step}}"@endif
            @if(isset($min)) min="{{$min}}"@endif
            @if(isset($max)) max="{{$max}}"@endif
            @if(!empty($symbols_max)) data-symbols-max="{{$symbols_max}}"@endif
            @if(!empty($symbols_min)) data-symbols-min="{{$symbols_min}}"@endif
    >
    @if (!empty($caption))
        <small class="form-text text-muted">{{ $caption }}</small>
    @endif
    @if ($errors->has($name))
        <small class="form-text text-muted">{{ $errors->first($name) }}</small>
    @endif
</div>
