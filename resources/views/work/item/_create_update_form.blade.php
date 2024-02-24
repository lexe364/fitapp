<form action="{{route('work.item.'.(isset($item)?'update':'create'),(isset($item)?$item->id:null))}}"
    method="post">
    @csrf

    <x-form.wrap_item>
        <x-slot:label>Имя</x-slot:label>
        <input type="text" name="name" class="form-control" value="{{old('name',(isset($item)?$item->name:NULL))}}">
    </x-form.wrap_item>

@if(isset($item->id))
    <x-form.wrap_item>
        <x-slot:label>Привязка изображения</x-slot:label>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <x-work.man class="mb-3">
                    @foreach(config('work.man.muscles.front') AS $muscle_name)
                        <img src="/assets/img/chel/one_color/muscels/{{$muscle_name}}.png"
                             class="{{($item->image_key===$muscle_name?'':'filter_grayscale75 ')}} muscul_img {{Str::slug($muscle_name)}}">
                    @endforeach
                </x-work.man>
            </div>
            <div class="col-sm-12 col-md-6">

                @foreach(config('work.man.muscles.front') AS $muscle_name)
                    <div>
                    <label for="radio_{{Str::slug($muscle_name)}}" class="">
                        <input type="radio" name="image_key"
                               {{($item->image_key!==$muscle_name?'':'checked="checked"')}}
                               value="{{$muscle_name}}" id="radio_{{Str::slug($muscle_name)}}">
                        <span>{{$muscle_name}}</span>
                    </label>
                    </div>
                    @push('js.onload')
                        $('#radio_{{Str::slug($muscle_name)}}').on('change', function(){
                            $('img.muscul_img').addClass('filter_grayscale75')
                            $('img.muscul_img.{{Str::slug($muscle_name)}}').removeClass('filter_grayscale75')
                        })
                    @endpush
                @endforeach
            </div>
        </div>
{{--        <input type="text" name="name" class="form-control" value="{{old('name',(isset($item)?$item->name:NULL))}}">--}}
    </x-form.wrap_item>
@endif


    <x-form.wrap_item>
        <x-slot:label></x-slot:label>
        <button class="btn btn-success me-5" type="submit">Сохранить</button>
        @if(isset($item?->id))
            <a class="btn btn-secondary" href="{{route('work.item.destroy',$item->id)}}" onclick="return confirm('?')">Удалить</a>
        @endif
    </x-form.wrap_item>


    <?php dump($item?->toArray()??[]);?>


</form>
