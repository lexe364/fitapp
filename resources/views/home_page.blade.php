@extends('_template.main_template')
@section('title',$title??'')
@section('breadcrumb_li_items')
    <li class="breadcrumb-item active">Главная</li>
{{--    <li class="breadcrumb-item active">Remix</li>--}}
@endsection
@section('content')

    <x-card>
        <x-slot:title>Записывай !</x-slot:title>

    </x-card>

@endsection
