@extends('layouts.main')

@section('content')
    <h1 class="text-center">Create Album</h1>
    <hr />
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url' => 'albums', 'method' => 'post', 'class' => '']) !!}

        <!-- Album name -->
            <div class="form-group">
                {!! Form::label('name', 'Name:', ['class' => '',]) !!}
                {!! Form::text('name', null,
                    [
                        'class' => 'form-control',
                        'autofocus' => '',
                        'placeholder' => 'Enter an album name'
                    ])
                !!}
            </div>

            <!-- Description -->
            <div class="form-group">
                {!! Form::label('description', 'Description:', ['class' => '',]) !!}
                {!! Form::textarea('description', null,
                    [
                        'class' => 'form-control',
                         'placeholder' => 'Some things about the album',
                         'rows' => 2
                     ])
                 !!}
            </div>

            <!-- Is private album Checkboxes -->
            <div class="form-group">
                {!! Form::checkbox('is_private', null, true, ['id' => 'is_private']) !!}
                {!! Form::label('is_private', 'Private album', ['class' => '',]) !!}
            </div>

            <!-- Submit -->
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control',]) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection