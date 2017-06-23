@extends('layouts.admin')
	@section('content')
	{!!Form::open(['route'=>'admin.profiles.store', 'method'=>'POST'])!!}
		@include('admin.profile.forms.profile')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection