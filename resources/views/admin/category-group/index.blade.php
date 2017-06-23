@extends('layouts.admin')
	@section('content')
	<div class="category-groups">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Operacion</th>
			</thead>
			@foreach($catgroups as $catgroup)
				<tbody>
					<td>{{$catgroup->name}}</td>
					<td>
						{!!link_to_route('admin.category-groups.edit', $title = 'Editar', $parameters = $catgroup, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
	@endsection