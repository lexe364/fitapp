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

        <a href="{{route('work.create')}}" class="btn btn-primary">добавить</a>

        <table class="table">

        </table>

    </x-card>

@endsection
