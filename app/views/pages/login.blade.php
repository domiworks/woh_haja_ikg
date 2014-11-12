@extends('layouts.default')
@section('content')
	
	<!-- form login -> redirect to /signin -->	
	{{ Form::open(array('url' => '/signin')) }}
	
		{{ Form::text('username', Input::old('username'), array('placeholder'=>'username')) }}
		{{ Form::password('password', Input::old('password'), array('placeholder'=>'password')) }}	
		{{ Form::submit('Login') }}
		{{ Form::token() }}
		{{ Form::close() }}	

@stop