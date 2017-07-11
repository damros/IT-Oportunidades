@extends('layouts.admin')
	@section('content')
	<div class="application-status">
		<table class="table dttable">
			<thead>
				<th>Nombre</th>
				<th>Operacion</th>
			</thead>
			<tbody>
				@foreach($apstatus as $apstat)
				<tr>
					<td>{{$apstat->name}}</td>
					<td>
						{!!link_to_route('admin.application-status.edit', $title = 'Editar', $parameters = $apstat, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endsection