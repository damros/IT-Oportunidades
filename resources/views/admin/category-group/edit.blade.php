@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Grupo de Categorías</h3>
				</div>
				<div class="panel-body">
				{!!Form::model($catgroup,['route'=>['admin.category-groups.update',$catgroup],'method'=>'PUT'])!!}
					@include('admin.category-group.forms.catgroup')
					{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}

				{!!Form::open(['route'=>['admin.category-groups.destroy', $catgroup], 'method' => 'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}	
				</div>
			</div>
		</div>
	</div>		

	@endsection