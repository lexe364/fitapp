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

        @include('work.history._create_update_form')

    </x-card>

@endsection
