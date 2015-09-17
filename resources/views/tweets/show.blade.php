@extends('app')

@section('content')

  <h1>{{ $tweet->title }}</h1>

  <h3>"{{ $tweet->body }}"</h3>

  <br>

  @if (Auth::id() == $tweet->user_id)
    <a class="tweet-button" href="/tweets/{{ $tweet->id }}/edit">Edit Tweet</a>

    <br>

    {!! Form::open(['url' => 'tweets/' . $tweet->id, 'class' => 'inline-form']) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        <button class="delete-tweet-button">
            Delete Tweet
        </button>
    {!! Form::close() !!}
  @endif

  @include('errors.list')
  
  <h4>Add Reply</h4>
  {!! Form::open(['url' => 'replies']) !!}
      {!! Form::hidden('tweet_id', $tweet->id) !!}

      <div class="form-group">
          {!! Form::label('body', 'Body: ') !!}
          <br>
          {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::submit('Add Reply', ['class' => 'btn btn-primary form-control tweet-button']) !!}
      </div>
  {!! Form::close() !!}

@stop
