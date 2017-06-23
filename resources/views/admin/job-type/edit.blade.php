@extends('layouts.admin')
	@section('content')
		{!!Form::model($jobtype,['route'=>['admin.job-types.update',$jobtype],'method'=>'PUT'])!!}
			@include('admin.job-type.forms.jobtype')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['admin.job-types.destroy', $jobtype], 'method' => 'DELETE', 'onsubmit' => 'confirmDelete(this);'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection