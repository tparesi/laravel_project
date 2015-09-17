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

  <h3>All Replies:</h3>

  <ul>
    @foreach ($tweet->replies as $reply)
        <li>
          {{ $reply->body }}
          @if (Auth::id() == $reply->user_id)
              {!! Form::open(['url' => 'replies/' . $reply->id, 'class' => 'inline-form']) !!}
                  {!! Form::hidden('_method', 'DELETE') !!}
                  <button class="delete-tweet-button">
                      Delete
                  </button>
              {!! Form::close() !!}
          @endif
        </li>
    @endforeach
  </ul>

  <br>

  @include('errors.list')

  {!! Form::open(['url' => 'replies']) !!}
      {!! Form::hidden('tweet_id', $tweet->id) !!}

      <div class="form-group">
          {!! Form::label('body', 'Add Reply: ') !!}
          <br>
          {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::submit('Add Reply', ['class' => 'btn btn-primary form-control tweet-button']) !!}
      </div>
  {!! Form::close() !!}

@stop
