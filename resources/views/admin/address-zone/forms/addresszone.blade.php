<div class="form-group">
	{!!Form::label('nombre','Código:')!!}
	{!!Form::text('code',null,['class'=>'form-control','placeholder'=>'Ingresa el Código'])!!}
	
        {!!Form::label('nombre','Nombre:')!!}
	{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">