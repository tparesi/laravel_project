@extends('app')

@section('content')

  <h1>{{ $tweet->title }}</h1>

  <h3>"{{ $tweet->body }}"</h3>

  <br>
  <a class="tweet-button" href="/tweets/{{ $tweet->id }}/edit">Edit Tweet</a>

@stop
