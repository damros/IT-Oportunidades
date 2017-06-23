@extends('layouts.admin')
	@section('content')
	{!!Form::open(['route'=>'admin.category-groups.store', 'method'=>'POST'])!!}
		@include('admin.category-group.forms.catgroup')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection