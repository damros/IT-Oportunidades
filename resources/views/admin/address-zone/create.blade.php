@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Crear Zona</h3>
				</div>
				<div class="panel-body">	
				{!!Form::open(['route'=>'admin.address-zones.store', 'method'=>'POST'])!!}
					@include('admin.address-zone.forms.addresszone')
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>	
	@endsection