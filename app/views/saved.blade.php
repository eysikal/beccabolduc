@extends('_layouts/default')

@section('content')

    <section class="container art">
        <div class="row">
            <div class="col-md-4">
                <h3><a href="{{ $art_url }}">{{ $art_name }}</a> successfully uploaded</h3>
            </div>
        </div>
    </section>

@stop