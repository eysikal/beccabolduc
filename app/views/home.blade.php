@extends('_layouts/default')

@section('content')

<section class="container art">
    @foreach ($pieces as $piece)
        <div class="col-sm-2 text-center tile">
            <a href="/art/{{ $piece->name }}"><img src="/assets/images/art/tile/{{ $piece->image }}-tile.jpg"></a>
        </div>
    @endforeach
</section>

@stop