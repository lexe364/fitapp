<form action="{{route('work.'.(isset($history)?'update':'store'),(isset($history)?$history->id:null))}}"
    method="post">
    @csrf

    <x-form.wrap_item>
        <x-slot:label>Имя тренировки</x-slot:label>
        <input type="text" name="name" class="form-control" value="{{old('name',(isset($history)?$history->name:date('Y-m-d H:i')))}}">
    </x-form.wrap_item>


    <x-form.wrap_item>
        <x-slot:label>Что тренировалось</x-slot:label>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <select name="item_id" class="form-control">
                    <option value="">[не выбрано]</option>
                    @foreach($work_items??[] as $work_item)
                        <option <?php echo ($work_item->id==$history->item_id?'selected="selected"':'')?> value="{{$work_item->id}}">{{$work_item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-sm-12">
                <input type="text" name="item_name" class="form-control"
                       placeholder="текстом, если нет в списке"
                       value="{{old('item_name')}}">
            </div>
        </div>
    </x-form.wrap_item>

    <x-form.wrap_item>
        <x-slot:label>Сколько "остывать"</x-slot:label>
        <input type="number" name="colling_days" class="form-control" value="{{old('colling_days',(isset($history)?$history->colling_days:7))}}">
    </x-form.wrap_item>


    <x-form.wrap_item>
        <x-slot:label></x-slot:label>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </x-form.wrap_item>

    <? dump($history??'');?>

</form>
