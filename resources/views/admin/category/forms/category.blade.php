<div class="form-group">
	{!!Form::label('Grupo','Grupo:')!!}
	{!!Form::select('category_group_id',$catgroups,null,['id'=>'category','class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!!Form::label('nombre','Nombre:')!!}
	{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
</div>