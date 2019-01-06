@extends('layouts.admin')
	@section('content')
	<div class="job-types">
		<table class="table dttable">
			<thead>
				<th>Código</th>
				<th>Nombre</th>
				<th>Operación</th>
			</thead>
			<tbody>
				@foreach($addresszones as $addresszone)
				<tr>
					<td>{{$addresszone->code}}</td>
					<td>{{$addresszone->name}}</td>
					<td>
						{!!link_to_route('admin.address-zones.edit', $title = 'Editar', $parameters = $addresszone, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endsection
