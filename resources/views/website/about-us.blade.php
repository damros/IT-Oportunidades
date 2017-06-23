@extends('layouts.website')
@section('title')
<title>Acerca De - IT Oportunidades</title>
@endsection
@section('content')


<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>{{trans('labels.Terms_Of_Service')}}</h2>
		</div>

	</div>
</div>


<!-- Content
================================================== -->


<!-- Container -->
<div class="container">

	{{ Html::image('images/logo4latam.png','4 Latam')}}
	
	<!-- Blog Posts -->
	<div class="sixteen columns">

		<!-- Post -->
		<div class="post-container">
			<div class="post-content">
				<h4>Nuestra Empresa</h4>
				<p> 
					4Latam fue fundada por socios con más de 25 años de experiencia en el sector informático, nació como la mejor alternativa regional para clientes que prefieren Socios de Negocios en vez de proveedores. 
					4Latam basa su éxito en profundizar la relación y centrar toda su estrategia de servicio ciento por ciento en la satisfacción del cliente.
				</p>
				
			</div>
		</div>
	</div>
</div>

@endsection