@extends('layouts.admin')
	@section('content')
	<div class="job-types">
		<table class="table dttable">
			<thead>
				<th>Nombre</th>
				<th>Operacion</th>
			</thead>
			<tbody>
				@foreach($jobtypes as $jobtype)
				<tr>
					<td>{{$jobtype->name}}</td>
					<td>
						{!!link_to_route('admin.job-types.edit', $title = 'Editar', $parameters = $jobtype, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endsection
