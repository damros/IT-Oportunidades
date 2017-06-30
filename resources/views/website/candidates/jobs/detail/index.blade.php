@extends('layouts.website')
@section('title')
<title>Detalle de Requerimiento - IT Oportunidades</title>
@endsection
@section('content')


<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span><a href="{!!URL::to('jobs/browse')!!}">Bolsa de Trabajo</a></span>
			<h2>{{$job->title}} </h2>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
		
		<!-- Company Info -->
		<div class="company-info">
			@if ( $job->company->logo )
				<img src="/images/companylogo/{{$job->company->logo}}" title="{{$job->company->name}}" style="width: 90px; height: 90px; margin-right: 10px;"/>
			@else
				<img src="/images/job-list-logo-01.png" alt="" style="width: 90px; height: 90px; margin-right: 10px;"/>
			@endif	
			<div class="content">
				<h4>{{$job->company->name}}</h4>
				<span><a href="#"><i class="fa fa-link"></i> {{$job->company->website}}</a></span>
				<span><a href="#"><i class="fa fa-twitter"></i> {{$job->company->twitter}}</a></span>
			</div>
			<div class="clearfix"></div>
		</div>
		
		{!! $job->description !!}

	</div>
	</div>


	<!-- Widgets -->
	<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			<h4>{{trans('labels.Overview')}}</h4>

			<div class="job-overview">
				
				<ul>
					<li>
						<i class="fa fa-map-marker"></i>
						<div>
							<strong>{{trans('labels.Location')}}:</strong>
							<span>{{$job->location}}</span>
						</div>
					</li>
					<li>
						<i class="fa fa-calendar"></i>
						<div>
							<strong>{{trans('labels.Start_Date')}}:</strong>
							<span>{{$job->start_date}}</span>
						</div>
					</li>
				</ul>

				@if ( Auth::guest() || (! Auth::guest() && currentUser()->profile->code == 'ca' ))
				<a href="#small-dialog" class="popup-with-zoom-anim button">{{trans('labels.Apply_For_This_Job')}}</a>

				@include('website.candidates.jobs.detail.partials.apply')
				@endif
			</div>

		</div>

	</div>
	<!-- Widgets / End -->


</div>


<!-- Footer
================================================== -->
<div class="margin-top-50"></div>


@endsection