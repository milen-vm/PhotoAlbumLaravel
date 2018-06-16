@extends('layouts.main')

@section('content')
    <h1 class="text-center">Edit Album</h1>
    <hr />
    <div class="col-md-4 col-md-offset-4">
    {!! Form::model($album, ['url' => 'albums/' . $album->id, 'method' => 'put', 'class' => '']) !!}

        @include('albums.form')

        <!-- Is private album Checkboxes -->
        <div class="form-group">
            {!! Form::checkbox('is_private', null, $album->is_private, ['id' => 'is_private']) !!}
            {!! Form::label('is_private', 'Private album', ['class' => '',]) !!}
        </div>

        <!-- Submit -->
        <div class="form-group">
            {!! Form::submit($buttonName, ['class' => 'btn btn-primary form-control',]) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection