@extends('layouts.website')
@section('title')
<title>Administrar Postulaciones - IT Oportunidades</title>
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>{{trans('labels.Manage_Applications')}}</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>{{trans('labels.You_Are_Here')}}:</li>
					<li><a href="/">{{trans('labels.Home')}}</a></li>
					<li>{{trans('labels.Application_Dashboard')}}</li>
				</ul>
			</nav>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">

	<!-- Table -->
	<div class="sixteen columns">

		<p class="margin-bottom-25" style="float: left;">{{ trans('labels.Job_Application_Begin') }} <strong><a target='{{$job->id}}' href="{!!URL::to('jobs/edit/'.$job->id.'')!!}">{{$job->title}} </a></strong>{{ trans('labels.Job_Application_End') }} </p>

	</div>


	<div class="eight columns">
		<!-- Select -->
		<form action="{!!URL::to('applications/manage/'.$job->id.'')!!}" method="GET">
			{!!Form::select('status',$applicationStatus, ( app('request')->input('status') ? app('request')->input('status') : null),['id'=>'applicationStatusFilter','class'=>'chosen-select-no-single','placeholder'=>trans('labels.Application_Status_Filter')]) !!}
		</form>			
		<div class="margin-bottom-35"></div>
	</div>
	
	<!-- Applications -->
	<div class="sixteen columns">
		@foreach($applications as $application)
		<!-- Application #1 -->
		<div class="application">


			<div class="app-content">

				<!-- Name / Avatar -->
				<div class="info">
					@if ( $application->candidate->photo )
						<img src="/images/candidatephoto/{{$application->candidate->photo}}" alt="" style="width: 90px; height: 90px;"/>
					@else
						<img src="/images/avatar-placeholder.png" alt="" style="width: 90px; height: 90px;"/>
					@endif
					<span>{{$application->candidate->name}}</span>
					<ul>
						<li><a target="{{$application->candidate->id}}" href="/documents/resumes/{{$application->candidate->resume_file}}"><i class="fa fa-file-text"></i> {{ trans('labels.Download_CV') }}</a></li>
					</ul>
				</div>

				<!-- Buttons -->
				<div class="buttons">
					<a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i> {{ trans('labels.Edit') }}</a>
					<a href="#two-1" class="button gray app-link"><i class="fa fa-sticky-note"></i> {{ trans('labels.Add_Note') }} </a>
					<a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> {{ trans('labels.Show_Details') }}</a>
				</div>
				<div class="clearfix"></div>

			</div>

			<!--  Hidden Tabs -->
			<div class="app-tabs">

				<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>

				<!-- First Tab -->
				{!!Form::open(['route'=>'applications/manage/edit', 'method'=>'POST', 'class'=>'ajax-submit' ]  )!!}
					@include('website.company.applications.manage.partials.edit')
				{!!Form::close()!!}

				<!-- Second Tab -->
				{!!Form::open(['route'=>'applications/manage/note', 'method'=>'POST', 'class'=>'ajax-submit'])!!}
					@include('website.company.applications.manage.partials.note')
				{!!Form::close()!!}

				<!-- Third Tab -->
				@include('website.company.applications.manage.partials.detail')
				
			</div>

			<!-- Footer -->
			<div class="app-footer">

				<div class="rating {{ratingStar($application->rating)}}-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>

				<ul>
					<li><i class="fa fa-file-text-o"></i> {{$application->status->name}}</li>
					<li><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($application->status->created_at)->format('d/m/Y') }} </li>
				</ul>
				<div class="clearfix"></div>

			</div>
		</div>
		@endforeach
	</div>
</div>


@endsection