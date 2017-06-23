<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			{!!Form::label('perfil','Perfil:')!!}
			{!!Form::select('profile_id',$profiles,null,['id'=>'profile','class'=>'form-control']) !!}
		</div>
	</div>	
</div>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			{!!Form::label('nombre','Nombre:')!!}
			{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del usuario'])!!}
		</div>	
	</div>	
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			{!!Form::label('email','Correo:')!!}
			{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el email del usuario'])!!}
		</div>
	</div>	
</div>
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
	{!!Form::label('usuario','Usuario:')!!}
	{!!Form::text('username',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre de usuario'])!!}
		</div>	
	</div>	
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
	{!!Form::label('password','Contraseña:')!!}
	{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa la clave del usuario'])!!}
		</div>
	</div>	
</div>