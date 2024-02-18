@extends('_template.main_template')
@section('title',$title??'')
@section('breadcrumb_li_items')
    <li class="breadcrumb-item ">Главаня</li>
    <li class="breadcrumb-item active">История тренировок</li>
    {{--    <li class="breadcrumb-item active">Remix</li>--}}
@endsection
@section('content')

    <x-card>
        <x-slot:title>{{$title??''}}</x-slot:title>

        <a href="{{route('work.create')}}" class="btn btn-primary mb-3 float-end">Добавить</a>

        <table class="table table-hover">
            @foreach($history_items AS $history)
            <tr class="cursor-pointer {{$history['html_class']}}" >
{{--                <td>{{$history['name']}}</td>--}}
                <td><a href="{{route('work.edit',$history['id'])}}">{{(new \Carbon\Carbon($history['datetime']))->format('d.m.Y H:i')}}</a></td>
                <td><a href="{route('work.item.edit',$history['item_id'])}}">{{$history->item->name}}</a></td>
{{--                <td>{{$history['after_hours']}}</td>--}}
{{--                <td>{{$history['colling_days']}}</td>--}}
                <td>{{$history['count']}}</td>
                <td>{{$history['comment']}}</td>
            </tr>
            @if($history['percent'])
                <tr onclick="window.location.assign('{{route('work.edit',$history['id'])}}')">
                    <td colspan="6">
                        <div class="progress ">
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

@endsection
