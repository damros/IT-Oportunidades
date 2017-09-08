@extends('layouts.admin')
	@section('content')
	<div class="organization">
		<table class="table dttable">
			<thead>
				<th>Direccion</th>
				<th>Teléfono</th>
				<th>Mail</th>
				<th>Acciones</th>
			</thead>
			<tbody>
                            @foreach($organizations as $organization)
                                <tr>
                                    
                                        <td>{{$organization->address}}</td>
                                        <td>{{$organization->phone}}</td>
                                        <td>{{$organization->email}}</td>
                                        <td>
                                                {!!link_to_route('admin.organization.edit', $title = 'Editar', $parameters = $organization, $attributes = ['class'=>'btn btn-primary'])!!}
                                        </td>
                                </tr>
                                @endforeach
                        </tbody>
		</table>
	</div>
	@endsection

