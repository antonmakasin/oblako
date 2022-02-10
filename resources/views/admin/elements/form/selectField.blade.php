<div class="form-group{{ $errors->has($name) ? ' is-error' : '' }}">
    @if(isset($title))
        <label for="field_{{ $name }}">{{ $title }}</label>
    @endif
    <select
            name="{{ $name }}"
            id="{{ isset($id) ? $id : "field_{$name}"}}"
            class="form-control"
            {{ isset($required) ? ' required' : ''}}
            {{ isset($multiple) ? ' multiple' : ''}}
            {{ isset($disabled) ? ' disabled' : ''}}
            {{ isset($readonly) ? ' readonly' : ''}}

            @if(!empty($multiple))
                size="{{ count($options) }}"
            @endif

            @if(!empty($attributes) && is_array($attributes))
                @foreach($attributes as $attr_name => $attr_value)
                    {{$attr_name}}="{{$attr_value}}"
                @endforeach
            @endif
    >
        @if(empty($multiple))
            <option value="">{{ $empty_line ?? '' }}</option>
        @endif

        @foreach($options as $key => $option)
            <option value="{{ $key }}" @if (old($name) && old($name) == $key) selected @elseif (!empty($value) && ($value == $key || is_array($value) && in_array($key, $value))) selected @endif>{{ $option }}</option>
        @endforeach
    </select>
    @if (!empty($caption))
        <small class="form-text text-muted">{{ $caption }}</small>
    @endif
    @if ($errors->has($name))
        <small class="form-text text-muted">{{ $errors->first($name) }}</small>
    @endif
</div>
