<form action="{{route('work.'.(isset($item)?'update':'store'),(isset($item)?$item->id:null))}}"
    method="post">
    @csrf

    <x-form.wrap_item>
        <x-slot:label>Имя тренировки</x-slot:label>
        <input type="text" name="name" class="form-control" value="{{old('name',(isset($item)?$item->name:date('Y-m-d H:i')))}}">
    </x-form.wrap_item>


    <x-form.wrap_item>
        <x-slot:label>Что тренировалось</x-slot:label>
        <select name="item_id" class="form-control">
            @foreach($work_items??[] as $work_item)
            <option value="{{$work_item->id}}">{{$work_item->name}}</option>
            @endforeach
        </select>
    </x-form.wrap_item>


    <x-form.wrap_item>
        <x-slot:label></x-slot:label>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </x-form.wrap_item>



</form>
