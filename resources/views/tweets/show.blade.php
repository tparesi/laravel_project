@extends('app')

@section('content')

  <h1>{{ $tweet->title }}</h1>

  <h2>{{ $tweet->body }}</h2>

@stop
