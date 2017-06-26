@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Permiso</h3>
				</div>
				<div class="panel-body">
				{!!Form::model($permission,['route'=>['admin.permissions.update',$permission],'method'=>'PUT'])!!}
					@include('admin.permission.forms.permission')
					{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}

				{!!Form::open(['route'=>['admin.permissions.destroy', $permission], 'method' => 'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}	
				</div>
			</div>
		</div>
	</div>		

	@endsection