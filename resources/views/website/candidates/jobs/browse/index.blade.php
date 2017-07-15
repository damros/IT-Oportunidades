@extends('layouts.website')
@section('title')
<title>Bolsa de Trabajo - IT Oportunidades</title>
@endsection
@section('content')


<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<h2>{{trans_choice('labels.Total_Jobs_Found',intval($jobs->total()),['count' => $jobs->total()])}}</h2>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eleven columns">
		<div class="padding-right">
			<div id="jobs-list">
				@include('website.candidates.jobs.browse.partials.jobs')
			</div>
		</div>
	</div>
	
	@include('website.candidates.jobs.browse.partials.filters')
	
</div>


<!-- Footer
================================================== -->
<div class="margin-top-25"></div>

@endsection
