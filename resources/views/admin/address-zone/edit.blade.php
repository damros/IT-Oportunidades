@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Zona</h3>
				</div>
				<div class="panel-body">	
				{!!Form::model($addresszone,['route'=>['admin.address-zones.update',$addresszone],'method'=>'PUT'])!!}
					@include('admin.address-zone.forms.addresszone')
					{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}

				{!!Form::open(['route'=>['admin.address-zones.destroy', $addresszone], 'method' => 'DELETE', 'onsubmit' => 'confirmDelete(this);'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>		
	@endsection