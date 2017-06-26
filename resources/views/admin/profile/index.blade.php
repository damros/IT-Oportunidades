@extends('layouts.admin')
	@section('content')
	<div class="application-status">
		<table class="table dttable">
			<thead>
				<th>Código</th>
				<th>Nombre</th>
				<th>Operacion</th>
			</thead>
			<tbody>
				@foreach($profiles as $profile)
					<tr>
						<td>{{$profile->code}}</td>
						<td>{{$profile->name}}</td>
						<td>
							{!!link_to_route('admin.profiles.edit', $title = 'Editar', $parameters = $profile, $attributes = ['class'=>'btn btn-primary'])!!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endsection