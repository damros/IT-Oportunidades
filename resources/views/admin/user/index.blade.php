@extends('layouts.admin')
	@section('content')
	<div class="users">
		<table class="table dttable">
			<thead>
				<th>Nombre</th>
				<th>Perfil</th>
				<th>Operacion</th>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->profile["name"]}}</td>
						<td>
							{!!link_to_route('admin.users.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary'])!!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endsection