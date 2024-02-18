@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show"  role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{--<div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--    A simple danger alert—check it out!--}}
{{--    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--</div>--}}
