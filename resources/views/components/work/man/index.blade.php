<div {{$attributes->merge(['class'=>'position-relative wrap_muclu_chel'])}} class="" data-blade="work.man.index" >
    <img src="/assets/img/chel/ch-b/Чб%20Чел%20.webp" class="chel_fon">
    @if(empty($slot))
        @foreach(config('work.man.muscles.front') AS $muscle_name)
            <img src="/assets/img/chel/one_color/muscels/{{$muscle_name}}.png" class="muscul_img {{Str::slug($muscle_name)}}">
        @endforeach
    @else
        {{$slot}}
    @endif
</div>
