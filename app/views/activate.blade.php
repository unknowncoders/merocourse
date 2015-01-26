@extends('layouts.default')

@section('title')
    Activate your account.
@stop

@section('header')

@stop

@section('content')

<div>

        Please activate your account by confirming your email address.

</div>

<div>

        {{ Form::open(array('url'=>'register/resend')) }}

            {{ Form::submit('Resend Confirmation') }}

        {{ Form::close() }}

</div>

@stop
