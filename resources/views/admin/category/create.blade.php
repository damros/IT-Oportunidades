@extends('layouts.admin')
	@section('content')
	{!!Form::open(['route'=>'admin.categorys.store', 'method'=>'POST'])!!}
		@include('admin.category.forms.category')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection