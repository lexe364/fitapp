<form action="{{route('work.item.'.(isset($item)?'update':'create'),(isset($item)?$item->id:null))}}"
    method="post">
    @csrf

    <x-form.wrap_item>
        <x-slot:label>Имя</x-slot:label>
        <input type="text" name="name" class="form-control" value="{{old('name',(isset($item)?$item->name:NULL))}}">
    </x-form.wrap_item>




    <x-form.wrap_item>
        <x-slot:label></x-slot:label>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </x-form.wrap_item>



</form>
