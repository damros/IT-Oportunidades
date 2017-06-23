@extends('layouts.admin')
	@section('content')

		{!!Form::model($catgroup,['route'=>['admin.category-groups.update',$catgroup],'method'=>'PUT'])!!}
			@include('admin.category-group.forms.catgroup')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		
		{!!Form::open(['route'=>['admin.category-groups.destroy', $catgroup], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}	

	@endsection