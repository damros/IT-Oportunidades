@extends('layouts.website')
@section('title')
<title>Mi Cuenta - IT Oportunidades</title>
@endsection
@section('content')
	
<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>{{trans('labels.My_Account')}}</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>{{trans('labels.You_Are_Here')}}:</li>
					<li><a href="/">{{trans('labels.Home')}}</a></li>
					<li>{{trans('labels.My_Account')}}</li>
				</ul>
			</nav>
		</div>

	</div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

	<div class="my-account">

		<ul class="tabs-nav">
			<li class=""><a href="#login">Login</a></li>
			<li><a href="#register">Registro</a></li>			
		</ul>
		
		@if ($message = Session::get('success'))
			<div class="notification closeable success">
				<p>{{ $message }}</p>
			</div>
		@endif

		@if ($message = Session::get('warning'))
			<div class="notification closeable error">
				<p>{{ $message }}</p>
			</div>
		@endif
		
		<div class="tabs-container mi-cuenta">
			
			<!-- Login -->
			@include('website.my-account.forms.login')

			<!-- Register -->
			@include('website.my-account.forms.register')
			
		</div>
	</div>
</div>

@endsection