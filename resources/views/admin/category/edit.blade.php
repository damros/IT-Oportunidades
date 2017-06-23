@extends('layouts.admin')
	@section('content')

		{!!Form::model($category,['route'=>['admin.categorys.update',$category],'method'=>'PUT'])!!}
			@include('admin.category.forms.category')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		
		{!!Form::open(['route'=>['admin.categorys.destroy', $category], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}	

	@endsection