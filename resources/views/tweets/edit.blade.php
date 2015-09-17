@extends('app')

@section('content')
    <h1>Edit Tweet</h1>

    <br>

    @include('errors.list')

    {!! Form::model($tweet, ['method' => 'PATCH', 'url' => 'tweets/' . $tweet->id]) !!}
        @include('tweets._form', ['submitButtonText' => 'Edit Tweet'])
    {!! Form::close() !!}
@stop
