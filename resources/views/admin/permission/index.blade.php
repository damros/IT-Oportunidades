@extends('layouts.admin')
	@section('content')
	<div class="permissions">
		<table class="table dttable">
			<thead>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Operacion</th>
			</thead>
			<tbody>
				@foreach($permissions as $permission)
					<tr>
						<td>{{$permission->name}}</td>
						<td>{{$permission->description}}</td>
						<td>
							{!!link_to_route('admin.permissions.edit', $title = 'Editar', $parameters = $permission, $attributes = ['class'=>'btn btn-primary'])!!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endsection