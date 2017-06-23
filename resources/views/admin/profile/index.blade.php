@extends('layouts.admin')
	@section('content')
	<div class="application-status">
		<table class="table">
			<thead>
				<th>Código</th>
				<th>Nombre</th>
				<th>Operacion</th>
			</thead>
			@foreach($profiles as $profile)
				<tbody>
					<td>{{$profile->code}}</td>
					<td>{{$profile->name}}</td>
					<td>
						{!!link_to_route('admin.profiles.edit', $title = 'Editar', $parameters = $profile, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
	@endsection