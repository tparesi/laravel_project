@extends('app')

@section('content')

    <h1>All Tweets</h1>

    <ul>
      @foreach ($tweets as $tweet)
          <li>
            <a href="/tweets/{{ $tweet->id }}">{{ $tweet->title }}</a>
          </li>
      @endforeach
    </ul>

    <br>
    <a class="tweet-button" href="/tweets/create">New Tweet</a>
@stop
