@extends('layouts.admin')
	@section('content')
	<div class="category-groups">
		<table class="table dttable">
			<thead>
				<th>Nombre</th>
				<th>Operacion</th>
			</thead>
			<tbody>
				@foreach($catgroups as $catgroup)
				<tr>
					<td>{{$catgroup->name}}</td>
					<td>
						{!!link_to_route('admin.category-groups.edit', $title = 'Editar', $parameters = $catgroup, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endsection