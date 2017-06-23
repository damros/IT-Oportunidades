@extends('layouts.admin')
	@section('content')
	{!!Form::open(['route'=>'admin.application-status.store', 'method'=>'POST'])!!}
		@include('admin.application-status.forms.apstatus')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection