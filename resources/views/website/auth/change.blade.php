@extends('layouts.website')
@section('title')
<title>Cambiar Mi Contraseña - IT Oportunidades</title>
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> Cambiar Mi Contraseña</h2>
		</div>

	</div>
</div>

<div class="container">
	<!-- Recent Jobs -->
	<div class="sixteen columns">
		<div class="padding-right submit-page">	
			<form method="POST" action="/password/change">
				{!! csrf_field() !!}

				@if (count($errors) > 0)
					<div class="notification closeable error">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>						
				@endif
				
				@if ($message = Session::get('success'))
					<div class="notification closeable success">
						<p>{{ $message }}</p>
					</div>
				@endif				

				<div class="form">
					<h5>{{ trans('labels.Current_Password') }}</h5>
					<input type="password" name="current-password">
				</div>

				<div class="form">
					<h5>{{ trans('labels.New_Password') }}</h5>
					<input type="password" name="password">
				</div>

				<div class="form">
					<h5>{{ trans('labels.Repeat_Password') }}</h5>
					<input type="password" name="password_confirmation">
				</div>

				<div class="divider margin-top-10"></div>
							
				<div>
					<button type="submit">
						Cambiar Mi Contraseña
					</button>
				</div>
			</form>
		</div>
	</div>
</div>	

<!-- Footer
================================================== -->
<div class="margin-top-60"></div>

@endsection