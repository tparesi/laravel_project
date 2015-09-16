@extends('app')

@section('content')

  <h1>All Tweets</h1>

  @foreach ($tweets as $tweet)
      <a href="/tweets/{{ $tweet->id }}">{{ $tweet->title }}</a>
      <br>
  @endforeach

@stop
