@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Crear Categoría</h3>
				</div>
				<div class="panel-body">	
				{!!Form::open(['route'=>'admin.categorys.store', 'method'=>'POST'])!!}
					@include('admin.category.forms.category')
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>	
	@endsection