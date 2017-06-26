@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Crear Tipo de Trabajo</h3>
				</div>
				<div class="panel-body">	
				{!!Form::open(['route'=>'admin.job-types.store', 'method'=>'POST'])!!}
					@include('admin.job-type.forms.jobtype')
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>	
	@endsection