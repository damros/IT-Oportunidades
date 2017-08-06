@extends('layouts.login')
	@section('content')
    <div class="container"> 		
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>IT</b> Oportunidades</a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				@include('admin.alerts.success')
				@include('admin.alerts.errors')
				@include('admin.alerts.request')				
				<p class="login-box-msg">Ingrese sus datos para iniciar sesión</p>

				{!!Form::open(['route'=>'adminlogin', 'id'=>'loginform', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal'])!!}	
				<div class="form-group has-feedback">
					{!!Form::text('email',null,['id'=>'login-email','class'=>'form-control','placeholder'=>'E-Mail'])!!}
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					{!!Form::password('password',['id'=>'login-password','class'=>'form-control','placeholder'=>'Contraseña'])!!}
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-xs-4">
						{!!Form::submit('Ingresar',['id'=>'btn-login','class'=>'btn btn-primary btn-block btn-flat'])!!}		  
					</div>
					<!-- /.col -->
				</div>
				{!!Form::close()!!}

			</div>
			<!-- /.login-box-body -->
		</div>
    </div>
    	
	@endsection  