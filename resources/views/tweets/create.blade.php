@extends('app')

@section('content')
    <h1>Make a new Tweet</h1>

    <br>

    @include('errors.list')

    {!! Form::open(['url' => 'tweets']) !!}
        @include('tweets._form', ['submitButtonText' => 'Publish Tweet'])
    {!! Form::close() !!}
@stop
