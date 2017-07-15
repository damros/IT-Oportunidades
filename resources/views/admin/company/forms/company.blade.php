<div class="col-xs-6">
	{!!Form::label('Nombre','Nombre:')!!}
	{!!Form::text('name',$company->name,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>
<div class="col-xs-6">
	{!!Form::label('cuit','CUIT:')!!}
	{!!Form::text('cuit',$company->identification,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('telefono','Teléfono:')!!}
	{!!Form::text('telefono',$company->phone,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('website','WebSite:')!!}
	{!!Form::text('website',$company->website,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('lema','Lema:')!!}
	{!!Form::text('lema',$company->tagline,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('video','Video:')!!}
	{!!Form::text('video',$company->video,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-12">
	{!!Form::label('twiter','Usuario de Twitter:')!!}
	{!!Form::text('twiter',$company->twitter,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>


<div class="col-xs-12">
	{!!Form::label('detallePerfil','Detalle de Perfil de la Empresa:')!!}
        <div style="border: 1px solid #ccc; padding: 6px 12px; background-color: white">{!!$company->description!!}</div>
</div>

