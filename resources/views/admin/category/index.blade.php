@extends('layouts.admin')
	@section('content')
	<div class="category-groups">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Grupo</th>
				<th>Operacion</th>
			</thead>
			@foreach($categorys as $category)
				<tbody>
					<td>{{$category->name}}</td>
					<td>{{$category->group["name"]}}</td>
					<td>
						{!!link_to_route('admin.categorys.edit', $title = 'Editar', $parameters = $category, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
	@endsection