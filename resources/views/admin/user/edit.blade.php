@extends('layouts.admin')
	@section('content')

		{!!Form::model($user,['route'=>['admin.users.update',$user],'method'=>'PUT'])!!}
			@include('admin.user.forms.usradmin')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		
		{!!Form::open(['route'=>['admin.users.destroy', $user], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}	

	@endsection