@extends('layouts.admin')
	@section('content')
	<div class="application-status">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Operacion</th>
			</thead>
			@foreach($apstatus as $apstat)
				<tbody>
					<td>{{$apstat->name}}</td>
					<td>
						{!!link_to_route('admin.application-status.edit', $title = 'Editar', $parameters = $apstat, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tbody>
			@endforeach
		</table>
		{!!$apstatus->render()!!}
	</div>
	@endsection