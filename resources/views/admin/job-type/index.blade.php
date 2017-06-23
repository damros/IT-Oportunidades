@extends('layouts.admin')
	@section('content')
	<div class="job-types">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Operacion</th>
			</thead>
			@foreach($jobtypes as $jobtype)
				<tbody>
					<td>{{$jobtype->name}}</td>
					<td>
						{!!link_to_route('admin.job-types.edit', $title = 'Editar', $parameters = $jobtype, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
	@endsection
