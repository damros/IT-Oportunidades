<div class="col-xs-12">
	{!!Form::label('direccion','Dirección:')!!}
	{!!Form::text('address',$organization->address,['class'=>'form-control', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('localidad','Localidad:')!!}
	{!!Form::text('location',$organization->location,['class'=>'form-control', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('provincia','Provincia:')!!}
	{!!Form::text('province',$organization->province,['class'=>'form-control', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('telefono','Teléfono:')!!}
	{!!Form::text('phone',$organization->phone,['class'=>'form-control', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('email','E-Mail:')!!}
	{!!Form::text('email',$organization->email,['class'=>'form-control', 'style'=>'cursor:default; background-color:white'])!!}
</div>

