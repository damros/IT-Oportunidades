@extends('layouts.login')
	@section('content')
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Ingresar</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Olvidó su contraseña?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
							{!!Form::open(['route'=>'adminlogin', 'id'=>'loginform', 'method'=>'POST', 'role'=>'form', 'class'=>'form-horizontal'])!!}
                                    
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
									{!!Form::text('login',null,['id'=>'login-username','class'=>'form-control','placeholder'=>'Usuario o E-Mail'])!!}
								</div>

								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
									{!!Form::password('password',['id'=>'login-password','class'=>'form-control','placeholder'=>'Contraseña'])!!}
								</div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
									  	{!!Form::submit('Ingresar',['id'=>'btn-login','class'=>'btn btn-primary'])!!}
                                    </div>
                                </div>
 
							{!!Form::close()!!}
 



                        </div>                     
                    </div>  
        </div>
    </div>
    	
	@endsection  