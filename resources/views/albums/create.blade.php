@extends('layouts.main')

@section('content')
    <h1 class="text-center">Create Album</h1>
    <hr />
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {!! Form::open(['url' => 'albums', 'method' => 'post', 'class' => '']) !!}

                @include('albums.form')

                <!-- Is private album Checkboxes -->
                <div class="form-group">
                    {!! Form::checkbox('is_private', null, true, ['id' => 'is_private']) !!}
                    {!! Form::label('is_private', 'Private album', ['class' => '',]) !!}
                </div>

                <!-- Submit -->
                <div class="form-group">
                    {!! Form::submit($buttonName, ['class' => 'btn btn-primary form-control',]) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection