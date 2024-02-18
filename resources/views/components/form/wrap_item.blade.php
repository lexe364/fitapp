<div {{$attributes->merge(['class'=>'row mb-3'])}}>
    <label for="inputText" class="col-sm-3 col-form-label">{{$label??''}}</label>
    <div class="col-sm-9">
        {{$slot}}
    </div>
</div>
