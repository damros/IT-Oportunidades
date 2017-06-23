@extends('layouts.admin')
	@section('content')
	<div class="permissions">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Operacion</th>
			</thead>
			@foreach($permissions as $permission)
				<tbody>
					<td>{{$permission->name}}</td>
					<td>{{$permission->description}}</td>
					<td>
						{!!link_to_route('admin.permissions.edit', $title = 'Editar', $parameters = $permission, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
	@endsection