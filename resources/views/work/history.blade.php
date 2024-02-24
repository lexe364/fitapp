@extends('_template.main_template')
@section('title',$title??'')
@section('breadcrumb_li_items')
    <li class="breadcrumb-item ">Главная</li>
    <li class="breadcrumb-item active">История тренировок</li>
    {{--    <li class="breadcrumb-item active">Remix</li>--}}
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-5">


            <x-card>
                <x-work.man>
                    @foreach($work_items_with_image_key AS $_workitem)
                        <?
                        $html_class = Str::slug($_workitem->image_key);
                        $html_class .= $_workitem->get_html_class('from_percent');
                        ?>
                        <img src="/assets/img/chel/one_color/muscels/{{$_workitem->image_key}}.png"
                             class=" muscul_img {{$html_class}} ">
                    @endforeach
                </x-work.man>
            </x-card>
        </div>
        <div class="col-sm-12 col-md-7">
            <x-card>
                <x-slot:title>{{$title??''}}</x-slot:title>

                <a href="{{route('work.create')}}" class="btn btn-primary mb-3 float-end">Добавить</a>

                <table class="table table-hover1">
                    @foreach($history_items AS $history)
                        <tr class="cursor-pointer table-{{$history['html_class']}}" >
                            {{--                <td>{{$history['name']}}</td>--}}
                            <td><a href="{{route('work.item.edit',$history['item_id'])}}">{{$history->item->name}}</a></td>
                            <td><a href="{{route('work.edit',$history['id'])}}">{{(new \Carbon\Carbon($history['datetime']))->format('d.m.Y H:i')}}</a></td>

                            <td>{{$history['work']}}</td>
                            <td>
                                @if($history['is_need_work'])
                                    <a href="{{route('work.duplicate',$history['id'])}}" class="btn btn-sm btn-dark">Дублировать</a>
                                @endif
                            </td>
                        </tr>
                        @if($history['percent'])
                            <tr onclick="window.location.assign('{{route('work.edit',$history['id'])}}')">
                                <td colspan="6">
                                    <div class="progress mb-5 ">
                                        <div class="progress-bar bg-{{$history['html_class']}}" role="progressbar" style="width: {{$history['percent']}}%"
                                             aria-valuenow="{{$history['percent']}}" aria-valuemin="0" aria-valuemax="100">
                                            {{$history['percent']}}% {{$history['after_days']}} / {{$history['colling_days']}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>

                {{$history_items->links()}}
            </x-card>
        </div>
    </div>


@endsection
