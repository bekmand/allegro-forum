@extends('app')

@section('content')

    <!-- Username Form Input -->

    <div class="form-group">
        {!! Form::label('Username', 'Username: ') !!}
        {!! Form::text('Username', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Password Form Input -->
    
    <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Create Form input -->
    
    <div class="form-group">
        {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    
    
    
@endsection