@extends('_layouts/default')

@section('content')

<section class="container">
    <div class="piece">
        <img src="/assets/images/art/full/{{ $piece->image }}.jpg" alt="{{ $piece->name }}">
    </div>
</section>

@stop