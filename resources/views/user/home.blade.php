@extends('app')

@section('content')
    <!-- Form field for update_User -->
    {!! Form::open(['route' => ['user_update', $user->id]]) !!}

    <!-- Name Form Input -->

    <div class="form-group">
        {!! Form::label('Name', 'Name:') !!}
        {!! Form::text('Name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Email Form Input -->

    <div class="form-group">
        {!! Form::label('Email', 'Email:') !!}
        {!! Form::email('Email', null, ['class' => 'form-control']) !!}
    </div>



    <!-- user_Update Form input -->

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
    </div>



    {!! Form::close() !!}

@endsection