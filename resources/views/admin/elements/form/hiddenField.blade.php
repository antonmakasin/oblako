<input
        type="hidden"
        name="{{ $name }}"
        id="field_{{ $name }}"
        value="@if (old($name)){{ old($name) }}@elseif (!empty($value) || $value === 0){{ $value }}@endif"
>
