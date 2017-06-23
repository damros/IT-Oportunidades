@extends('layouts.admin')
	@section('content')

		{!!Form::model($permission,['route'=>['admin.permissions.update',$permission],'method'=>'PUT'])!!}
			@include('admin.permission.forms.permission')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		
		{!!Form::open(['route'=>['admin.permissions.destroy', $permission], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}	

	@endsection