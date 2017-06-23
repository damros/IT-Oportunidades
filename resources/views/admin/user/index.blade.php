@extends('layouts.admin')
	@section('content')
	<div class="users">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Perfil</th>
				<th>Operacion</th>
			</thead>
			@foreach($users as $user)
				<tbody>
					<td>{{$user->name}}</td>
					<td>{{$user->profile["name"]}}</td>
					<td>
						{!!link_to_route('admin.users.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tbody>
			@endforeach
		</table>
		{{$users->render()}}
	</div>
	@endsection