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
	<div class="sixteen columns">
		<div class="padding-right">

			{!!Form::open(['route'=>'jobs/browse', 'method'=>'GET', 'class'=>'tooltips list-search search-jobs'])!!}				
				<button><i class="fa fa-search"></i></button>
				<input type="text" name="q" placeholder="{{trans('labels.Browse_Jobs_Search_Placeholder')}}" value="{{ app('request')->input('q') }}"/>
				<div class="clearfix"></div>
			{!!Form::close()!!}

			<div id="jobs-list">
				@include('website.candidates.jobs.browse.partials.jobs')
			</div>
		</div>
	</div>
	
</div>


<!-- Footer
================================================== -->
<div class="margin-top-25"></div>

@endsection
