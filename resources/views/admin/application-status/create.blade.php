@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Crear Estado de Postulación</h3>
				</div>
				<div class="panel-body">	
				{!!Form::open(['route'=>'admin.application-status.store', 'method'=>'POST'])!!}
					@include('admin.application-status.forms.apstatus')
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>	
	@endsection