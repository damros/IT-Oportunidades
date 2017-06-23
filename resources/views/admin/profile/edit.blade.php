@extends('layouts.admin')
	@section('content')
		{!!Form::model($profile,['route'=>['admin.profiles.update',$profile],'method'=>'PUT'])!!}
			@include('admin.profile.forms.profile')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['admin.profiles.destroy', $profile], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection