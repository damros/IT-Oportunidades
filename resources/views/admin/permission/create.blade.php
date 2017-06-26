@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Crear Permiso</h3>
				</div>
				<div class="panel-body">	
				{!!Form::open(['route'=>'admin.permissions.store', 'method'=>'POST'])!!}
					@include('admin.permission.forms.permission')
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>	
	@endsection