@extends('layouts.main')

@section('content')
    <h1 class="text-center">Login</h1>
    <hr>
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url' => 'auth\login', 'method' => 'post']) !!}

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control',]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control',]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Login', ['class' => 'btn btn-primary form-control',]) !!}
            </div>

        {!! Form::close() !!}
        @include('partials.errors')
    </div>
@endsection

