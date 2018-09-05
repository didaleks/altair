<div class="form-group row">
    {{--todo отрефакторить бы--}}
    @if (isset($attributes) && is_array($attributes))
        @if (!array_key_exists('hidden', $attributes))  {{-- Не выводить label для скрытого инпута --}}
                @if (is_array($fieldValue) && !empty($fieldValue['label']))
                    <label for="{{ $fieldName }}" class="col-md-12 col-form-label">{{ __($fieldValue['label']) }}</label>
                @else
                    <label for="{{ $fieldName }}" class="col-md-12 col-form-label">{{ __(str_singular(ucfirst(str_replace('_', ' ', $fieldName)))) }}</label>
                @endif
        @endif
    @else
        @if (is_array($fieldValue) && !empty($fieldValue['label']))
            <label for="{{ $fieldName }}" class="col-md-12 col-form-label">{{ __($fieldValue['label']) }}</label>
        @else
            <label for="{{ $fieldName }}" class="col-md-12 col-form-label">{{ __(str_singular(ucfirst(str_replace('_', ' ', $fieldName)))) }}</label>
        @endif
    @endif


    <div class="col-md-12">
        <input
                {{--вывод атрибутов--}}
                @if (isset($attributes) && is_array($attributes) && !empty($attributes))
                    @foreach ($attributes as $attribute)
                        {{ $attribute }}
                    @endforeach
                @endif
                id="{{ $fieldName }}"
                type="text"
                autocomplete="off"
                class="form-control{{ $errors->has($fieldName) ? ' is-invalid' : '' }}"
                name="{{ $fieldName }}"
                value="{{ isset($fieldValue['value']) ? $fieldValue['value'] : $model->$fieldName }}">

        @if ($errors->has($fieldName))
            <span class="invalid-feedback">
                <strong>{{ $errors->first($fieldName) }}</strong>
            </span>
        @endif
    </div>
</div>