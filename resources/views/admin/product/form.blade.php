<div class="row">
  <div class="col-md-10">

    @foreach ($fields as $fieldName => $fieldValue)
      @includeIf('admin.ui.' . (is_array($fieldValue) ? $fieldValue['type'] : $fieldValue), [
          'fieldName' => $fieldName,
          'fieldModelName' => isset($fieldValue['fieldModelName']) ? $fieldValue['fieldModelName'] : $fieldName,
          "fieldValue" => $fieldValue,
          'attributes' => isset($fieldValue['attributes'])? $fieldValue['attributes'] : '',
          'model' => $model
      ])
    @endforeach

    @if(!empty($model->customFields()))
      <p class="font-weight-bold">Поля для этой категории товара</p>
      @foreach ($model->customFields() as $fieldName => $fieldValue)
        @includeIf('admin.ui.' . (is_array($fieldValue) ? $fieldValue['type'] : $fieldValue), [
        'fieldName' => $fieldName,
        'fieldModelName' => isset($fieldValue['fieldModelName']) ? $fieldValue['fieldModelName'] : $fieldName,
        "fieldValue" => $fieldValue,
        'attributes' => isset($fieldValue['attributes'])? $fieldValue['attributes'] : '',
        'model' => $model
      ])
      @endforeach
    @endif

    <p class="font-weight-bold">Относится к категориям: </p>
    @foreach($categories->sortBy('name') as $category)
      <div class="form-group row">
        <div class="col-md-12">
          <div class="checkbox">
            {{ Form::checkbox('categories[]', $category->id, $model->categories->contains($category->id),array('id'=>'category'.$category->id)) }}
            {{ Form::label('category'.$category->id, $category->title) }}
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="col-md-1">
    <div class="control-buttons">
      <button type="submit" class="btn btn-outline-primary"><span data-feather="save"></span> {{ __('Сохранить') }}
      </button>
      <a target="_blank" href="{{ $model->url }}">
        <div class="btn btn-outline-primary"><span data-feather="eye"></span> {{ __('Смотреть продукт') }}</div>
      </a>
    </div>
  </div>
</div>