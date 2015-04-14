@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h2>{{ $post->title }}</h2>

            <p>{{ $post->body }}</p>
        </div>
        <div class="col-md-3">
            <p>Space for login, userinfo... more</p>
        </div>
    </div>
    <hr/>

    <div class="row">
        <div class="col-md-8">

            {!! Form::open(['route' => ['create_comment', $post->id]]) !!}

            <div class="form-group">
                {!! Form::label('Body', 'Compose comment: ') !!}
                {!! Form::text('body', null, ['class' => 'form-control']) !!}
            </div>

            @if(Auth::check())

                <div class="form-group">
                    {!! Form::submit('Comment', ['class' => 'btn btn-primary form-control']) !!}
                </div>

            @else
                <div class="form-group">
                    You need to login to comment...
                </div>
            @endif
            {!! Form::close() !!}
            <hr/>
            @foreach($comments as $comment)
                <article>
                    <p>{{ $comment->body }}</p>
                </article>
            @endforeach
        </div>
        <div class="col-md-4">

        </div>
    </div>


@endsection