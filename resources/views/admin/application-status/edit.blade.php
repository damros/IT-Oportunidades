@extends('layouts.admin')
	@section('content')

		{!!Form::model($apstatus,['route'=>['admin.application-status.update',$apstatus],'method'=>'PUT'])!!}
			@include('admin.application-status.forms.apstatus')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		
		{!!Form::open(['route'=>['admin.application-status.destroy', $apstatus], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}	

	@endsection