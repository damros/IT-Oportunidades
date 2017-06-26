@extends('layouts.admin')
	@section('content')
	
		<div>
			<div class="row centered-form">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Editar Perfil</h3>
					</div>
					<div class="panel-body">
					{!!Form::model($profile,['route'=>['admin.profiles.update',$profile],'method'=>'PUT'])!!}
						@include('admin.profile.forms.profile')
						{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}

					{!!Form::open(['route'=>['admin.profiles.destroy', $profile], 'method' => 'DELETE'])!!}
						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
					{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>

	@endsection