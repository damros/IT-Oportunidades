@extends('layouts.admin')
	@section('content')
	
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Usuario</h3>
				</div>
				<div class="panel-body">
				{!!Form::model($user,['route'=>['admin.users.update',$user],'method'=>'PUT'])!!}
					@include('admin.user.forms.usradmin')
					{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}

				{!!Form::open(['route'=>['admin.users.destroy', $user], 'method' => 'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}	
				</div>
			</div>
	    </div>
    </div>		

	@endsection