@extends('layouts.website')
@section('title')
<script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBegaytSShSATo1UIW-FXHAvfwtwQ1pIfU"></script>
<title>Contacto - IT Oportunidades</title>
@endsection

@section('content')
	
<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>{{trans('labels.Contact')}}</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>{{trans('labels.You_Are_Here')}}:</li>
					<li><a href="/">{{trans('labels.Home')}}</a></li>
					<li>{{trans('labels.Contact')}}</li>
				</ul>
			</nav>
		</div>

	</div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">
	<div class="sixteen columns">

		<h3 class="margin-bottom-20">{{trans('labels.Our_Office')}}</h3>

		<!-- Google Maps -->
		<section class="google-map-container">
			<div id="googlemaps" class="google-map google-map-full"></div>
		</section>
		<!-- Google Maps / End -->

	</div>
</div>
<!-- Container / End -->
			

<!-- Container -->
<div class="container">

<div class="eleven columns">

	<h3 class="margin-bottom-15">{{trans('labels.Contact_Form')}}</h3>
	
		<!-- Contact Form -->
		<section id="contact" class="padding-right">

			<!-- Form -->
			{!!Form::open(['route'=>'message.store', 'method'=>'POST', 'name'=>'contact', 'id'=>'contact', 'class'=>'ajax-submit tooltips'])!!}
				<div class="form-container">
					<fieldset>

						<div>
							<label>{{trans('labels.Name')}}: <span>*</span></label>
							<input name="name" type="text" id="name" value="{{ (currentUser() ? currentUser()->name : "") }}"/>
						</div>

						<div>
							<label>{{trans('labels.Email_Address')}}: <span>*</span></label>
							<input name="email" type="email" id="email" value="{{ (currentUser() ? currentUser()->email : "") }}" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
						</div>

						<div>
							<label>{{trans('labels.Message')}}: <span>*</span></label>
							<textarea name="message" cols="40" rows="3" id="comment" spellcheck="true"></textarea>
						</div>

					</fieldset>

					<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />

					<div id="result"></div>

					<input type="submit" class="submit" id="submit" value="{{trans('labels.Send_Message')}}" />
				</div>
			
				<div class="clearfix"></div>
				
				<div class="margin-bottom-20"></div>
				
				<!-- Message -->
				<div class="notification closeable success form-messages" style="display: none;"></div>							
				
			{!!Form::close()!!}

		</section>
		<!-- Contact Form / End -->

</div>
<!-- Container / End -->


<!-- Sidebar
================================================== -->
<div class="five columns">

	<!-- Information -->
	<h3 class="margin-bottom-10">{{trans('labels.Information')}}</h3>
	<div class="widget-box">

		<ul class="contact-informations">
			<li>{{$organization->address}} </li>
			<li>{{$organization->location}} </li>
		</ul>

		<ul class="contact-informations second">
			<li><i class="fa fa-phone"></i> <p>{{$organization->phone}}</p></li>
			<li><i class="fa fa-envelope"></i> <p>{{$organization->email}}</p></li>
		</ul>

	</div>

</div>
</div>
<!-- Container / End -->


@endsection

@section('scripts')
<!-- Google Maps -->
{!!Html::script('js/jquery.gmaps.min.js')!!}

<script type="text/javascript">
	(function($){
		$(document).ready(function(){

			$('#googlemaps').gMap({
				maptype: 'ROADMAP',
				scrollwheel: false,
				zoom: 13,
				markers: [
					{
						address: 'Av Presidente Roque Sáenz Peña 628, San Nicolás, Ciudad Autónoma de Buenos Aires', // Your Adress Here
						html: '<strong>Nuestra Oficina</strong><br>Av Presidente Roque Sáenz Peña 628 </br>Ciudad Autónoma de Buenos Aires ',
						popup: true
					}
				]
			});

		   });

	})(this.jQuery);
	
	/*
	var lat;
	var lng;
	var map;
	var styles = [{"stylers":[{"saturation":-100},{"gamma":1}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"saturation":50},{"gamma":0},{"hue":"#50a5d1"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#333333"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"weight":0.5},{"color":"#333333"}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"gamma":1},{"saturation":50}]}];

	//type your address after "address="
	jQuery.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address=Av Presidente Roque Sáenz Peña 628, San Nicolás, Ciudad Autónoma de Buenos Aires&sensor=false', function(data) {
		lat = data.results[0].geometry.location.lat;
		lng = data.results[0].geometry.location.lng;
	}).complete(function(){
		dxmapLoadMap();
	});

	function attachSecretMessage(marker, message)
	{
		var infowindow = new google.maps.InfoWindow(
			{ content: message
			});
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
		});
	}

	window.dxmapLoadMap = function()
	{
		var center = new google.maps.LatLng(lat, lng);
		var settings = {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoom: 16,
			draggable: false,
			scrollwheel: false,
			center: center,
			styles: styles 
		};
		map = new google.maps.Map(document.getElementById('googlemaps'), settings);

		var marker = new google.maps.Marker({
			position: center,
			title: '4 Latam',
			map: map
		});
		marker.setTitle('4 Latam'.toString());
	//type your map title and description here
	//attachSecretMessage(marker, '<h3>Map title</h3>Map HTML description');
	} */
</script>

@endsection