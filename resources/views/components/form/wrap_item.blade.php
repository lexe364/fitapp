<div {{$attributes->merge(['class'=>'row mb-3'])}}>
    <label for="inputText" class="col-sm-2 col-form-label">{{$label??''}}</label>
    <div class="col-sm-10">
        {{$slot}}
    </div>
</div>
