@extends('_layouts/default')

@section('content')

<section class="container art">
    <div class="row">
        <div class="col-md-4">
            <h3>Upload New Art</h3>
            {{ Form::open(array('url' => 'admin/post-art', 'files' => true)) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name - (ex: audrey-in-graphite)') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('type', 'Type') }}
                    {{ Form::select('medium', array('2' => 'Digital', '1' => 'Traditional'), null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('image', 'Image - (600px wide)') }}
                    {{ Form::file('full', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('thumb', 'Thumbnail - (190px x 190px)') }}
                    {{ Form::file('tile', array('class' => 'form-control')) }}
                </div>
                {{ Form::button('Submit', array('class' => 'btn btn-info', 'type' => 'submit')) }}
            {{ Form::close() }}
        </div>
    </div>
</section>

@stop