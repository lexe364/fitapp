@extends('_template.main_template')
@section('title',$title??'')
@section('breadcrumb_li_items')
    <li class="breadcrumb-item active">Главаня</li>
{{--    <li class="breadcrumb-item active">Remix</li>--}}
@endsection
@section('content')

    <x-card>
        <x-slot:title>Че?</x-slot:title>
    проект должен состоять из истории тренировок с выводим последних с
    </x-card>

@endsection
