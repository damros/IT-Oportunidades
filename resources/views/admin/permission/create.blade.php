@extends('layouts.admin')
	@section('content')
	{!!Form::open(['route'=>'admin.permissions.store', 'method'=>'POST'])!!}
		@include('admin.permission.forms.permission')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection