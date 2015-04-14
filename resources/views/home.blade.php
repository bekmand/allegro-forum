@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            @if(Auth::check())
            {!! Form::open(['route' => 'create_post']) !!}
            <!-- Title Form Input -->

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <!--  Form Input -->

            <div class="form-group">
                {!! Form::label('body', 'Body: ') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Submit post Form input -->


            <div class="form-group">
                {!! Form::submit('Submit_post', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
            @else
                <div class="form-group">
                    <a href="{{ url('auth/login') }}"><button class="btn btn-primary form-control">Login</button></a>

                </div>
            @endif

        @foreach($posts as $post)
                <article>
                    <a href="{{ route('post_path', [$post->id]) }}"><h3>{{ $post->title }}</h3></a>

                    <p>{{ $post->body }}</p>
                </article>
            @endforeach

        </div>
    </div>
@endsection