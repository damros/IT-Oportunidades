@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Tipo de Trabajo</h3>
				</div>
				<div class="panel-body">	
				{!!Form::model($jobtype,['route'=>['admin.job-types.update',$jobtype],'method'=>'PUT'])!!}
					@include('admin.job-type.forms.jobtype')
					{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}

				{!!Form::open(['route'=>['admin.job-types.destroy', $jobtype], 'method' => 'DELETE', 'onsubmit' => 'confirmDelete(this);'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>		
	@endsection