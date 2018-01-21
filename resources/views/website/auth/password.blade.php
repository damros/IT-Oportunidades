@extends('layouts.website')
@section('title')
<title>Olvidé Mi Contraseña - IT Oportunidades</title>
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> Olvidé Mi Contraseña</h2>
		</div>

	</div>
</div>

<div class="container">
	<!-- Recent Jobs -->
	<div class="sixteen columns">	
		<div class="padding-right submit-page">
			@if ($message = Session::get('status'))
				<div class="notification closeable success">
					<p>{{ $message }}</p>
				</div>
			@endif

			@if ($errors = Session::get('errors'))
				<div class="notification closeable error">
					<ul>
						@foreach($errors->all() as $error)
							<li>{!!$error!!}</li>
						@endforeach
					</ul>
				</div>
			@endif				
			<div class="contact-content">
				<div class="main-contact">
					 <h4 class="head">Ingresá tu E-Mail para cambiar tu contraseña</h4>
					 <div class="contact-form">
						 {!!Form::open(['url' => '/password','method' => 'POST'])!!}
						 
							<div class="col-md-6 contact-left">
								{!!Form::email('email')!!}
							</div>
						 
							<div class="divider margin-top-10"></div>
							
							{!!Form::submit('Enviar link')!!}
							
						 {!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Footer
================================================== -->
<div class="margin-top-60"></div>

@endsection