@extends('layouts.admin')
	@section('content')
	<div class="category-groups">
		<table class="table dttable">
			<thead>
				<th>Nombre</th>
				<th>Grupo</th>
				<th>Operacion</th>
			</thead>
			<tbody>
				@foreach($categorys as $category)
				<tr>
					<td>{{$category->name}}</td>
					<td>{{$category->group["name"]}}</td>
					<td>
						{!!link_to_route('admin.categorys.edit', $title = 'Editar', $parameters = $category, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endsection