@extends('_template.main_template')
@section('title',$title??'')
@section('breadcrumb_li_items')
    <li class="breadcrumb-item ">Главная</li>
    <li class="breadcrumb-item "><a href="{{route('work.history')}}">История тренировок</a></li>
    <li class="breadcrumb-item active">{{$title??''}}</li>
@endsection
@section('content')

    <x-card>
{{--        <x-slot:title>{{$title??''}}</x-slot:title>--}}

        @include('work.item._create_update_form')

    </x-card>

@endsection
