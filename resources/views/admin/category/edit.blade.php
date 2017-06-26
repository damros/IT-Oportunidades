@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Categoría</h3>
				</div>
				<div class="panel-body">
				{!!Form::model($category,['route'=>['admin.categorys.update',$category],'method'=>'PUT'])!!}
					@include('admin.category.forms.category')
					{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}

				{!!Form::open(['route'=>['admin.categorys.destroy', $category], 'method' => 'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}	
				</div>
			</div>
		</div>
	</div>
	@endsection