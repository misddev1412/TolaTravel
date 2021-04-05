<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    @if(isset($field['data']) && $field['data'] === "image")
        @if(\setting($field['name']))
            <p><img src="{{ asset('uploads/' . \setting($field['name'])) }}" width="100px"></p>
        @endif
    @endif
    <input type="{{ $field['type'] }}"
           name="{{ $field['name'] }}"
           value="{{ old($field['name'], \setting($field['name'])) }}"
           class="form-control {{ array_get( $field, 'class') }}"
           id="{{ $field['name'] }}"
           placeholder="{{ $field['label'] }}">
    @if ($errors->has($field['name']))
        <small class="help-block">{{ $errors->first($field['name']) }}</small>
    @endif
</div>