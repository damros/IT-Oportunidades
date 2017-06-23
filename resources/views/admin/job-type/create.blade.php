@extends('layouts.admin')
	@section('content')
	{!!Form::open(['route'=>'admin.job-types.store', 'method'=>'POST'])!!}
		@include('admin.job-type.forms.jobtype')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection