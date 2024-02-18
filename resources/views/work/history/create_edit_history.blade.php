@extends('_template.main_template')
@section('title',$title??'')
@section('breadcrumb_li_items')
    <li class="breadcrumb-item "><a href="/">Главная</a></li>
    <li class="breadcrumb-item "><a href="{{route('work.history')}}">История тренировок</a></li>
    <li class="breadcrumb-item active">Информация</li>
    {{--    <li class="breadcrumb-item active">Remix</li>--}}
@endsection
@section('content')

    <x-card>
        <x-slot:title>{{$title??''}}</x-slot:title>

{{--        @include('work.history._create_update_form')--}}
        <form action="{{route('work.'.(isset($history)?'update':'store'),(isset($history)?$history->id:null))}}"
              method="post">
            @csrf

{{--            <x-form.wrap_item>--}}
{{--                <x-slot:label>Имя тренировки</x-slot:label>--}}
{{--                <input type="text" name="name" class="form-control" value="{{old('name',(isset($history)?$history->name:date('Y-m-d H:i')))}}">--}}
{{--            </x-form.wrap_item>--}}


            <x-form.wrap_item>
                <x-slot:label>Что тренировалось</x-slot:label>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <select name="item_id" class="form-control">
                            <option value="">[не выбрано]</option>
                            @foreach($work_items??[] as $work_item)
                                <option <?php echo ((isset($history) AND $work_item->id==$history->item_id)?'selected="selected"':'')?> value="{{$work_item->id}}">{{$work_item->name}}</option>
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
{{--                <x-slot:label> /  </x-slot:label>--}}
                    <div class="row">
                        <div class="col-sm-16 col-md-6">
                            <div class="">Дней на восстановление</div>
                    <input type="number" name="colling_days" class="form-control" value="{{old('colling_days',(isset($history)?$history->colling_days:7))}}">
                        </div>
                        <div class="col-sm-16 col-md-6">
                            <div class="">Дата</div>
{{--                    <input type="date" name="date" class="form-control" value="{{old('date',(isset($history)?$history->date:date('Y-m-d')))}}">--}}
                    <input type="datetime-local" name="datetime" class="form-control" value="{{old('datetime',(isset($history)?$history->datetime:date('Y-m-d H:i')))}}">
                        </div>
                    </div>
            </x-form.wrap_item>

            <x-form.wrap_item>
                <x-slot:label>Что делалось</x-slot:label>
                 <div>
                     <textarea name="comment" class="form-control " rows="2">{{old('comment',(isset($history)?$history->comment:''))}}</textarea>
                 </div>

            </x-form.wrap_item>


            <x-form.wrap_item>
                <x-slot:label></x-slot:label>
                <button class="btn btn-success me-5" type="submit">Сохранить</button>
                @if(isset($history))
                    <a class="btn btn-secondary" href="{{route('work.destroy',$history->id)}}" onclick="return confirm('?')">Удалить</a>
                @endif
            </x-form.wrap_item>

            <?php dump($history?->toArray()??[]);?>

        </form>

    </x-card>

@endsection
