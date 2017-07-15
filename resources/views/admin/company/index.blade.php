@extends('layouts.admin')
@section('content')

 <div class="companies">
		<table class="table dttable">
			<thead>
				<th>Razon Social</th>
				<th>CUIT</th>
                                <th>Teléfono</th>
				<th>Más</th>
			</thead>
			<tbody>
				@foreach($companies as $company)
					<tr>
						<td>{{$company->name}}</td>
						<td>{{$company->identification}}</td>
                                                <td>{{$company->phone}}</td>
						<td>
							{!!link_to_route('admin.companies.edit', $title = 'Ver', $parameters = $company, $attributes = ['class'=>'btn btn-primary'])!!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection
