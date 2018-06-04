@extends('layouts.main')

@section('content')
    <h1 class="text-center">Registration</h1>
    <hr>
    <div class="col-md-4 col-md-offset-4">
        {!! Form::open(['url' => 'auth\register', 'method' => 'post', 'class' => 'form-horizontal',]) !!}

            <div class="form-group">
                {!! Form::label('username', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control',]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control',]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control',]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password:') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control',]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Register', ['class' => 'btn btn-primary form-control',]) !!}
            </div>

        {!! Form::close() !!}
        @include('partials.errors')
    </div>
@endsection

