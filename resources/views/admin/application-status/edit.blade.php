@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Estado de Postulación</h3>
				</div>
				<div class="panel-body">
				{!!Form::model($apstatus,['route'=>['admin.application-status.update',$apstatus],'method'=>'PUT'])!!}
					@include('admin.application-status.forms.apstatus')
					{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}

				{!!Form::open(['route'=>['admin.application-status.destroy', $apstatus], 'method' => 'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}	
				</div>
			</div>
		</div>
	</div>
	@endsection