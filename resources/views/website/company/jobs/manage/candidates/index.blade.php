@extends('layouts.website')
@section('title')
<title>Candidatos para requerimientos  - IT Oportunidades</title>
@endsection
@section('content')
	

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>{{trans('labels.Candidates_For_This_Job')}}</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>{{trans('labels.You_Are_Here')}}:</li>
					<li><a href="/">{{trans('labels.Home')}}</a></li>
					<li><a href="/jobs/manage">{{trans('labels.Job_Dashboard')}}</a></li>
					<li>{{trans('labels.Candidates_For_Jobs')}}</li>
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

		<p class="margin-bottom-25" style="float: left;">{{ trans('labels.Job_Candidates_Heading_Begin') }} <strong><a target='{{$job->id}}' href="{!!URL::to('jobs/edit/'.$job->id.'')!!}">{{$job->title}} </a></strong>{{ trans('labels.Job_Candidates_Heading_End') }} </p>

	</div>	
	
	<!-- Table -->
	<div class="sixteen columns">

		<table class="manage-table responsive-table">

			<tr>
				<th><i class="fa fa-user"></i> {{ trans('labels.Candidate_Name') }}</th>
				<th><i class="fa fa-info-circle"></i> {{ trans('labels.Candidate_Professional_Title') }}</th>
				<th><i class="fa fa-envelope"></i> {{ trans('labels.Email_Address') }}</th>
				<th><i class="fa fa-align-justify"></i> {{ trans('labels.Actions') }}</th>
			</tr>
			
			@foreach ($candidates as $candidate)
			<!-- Item #1 -->
			<tr>
				<td class="title">{{$candidate->name}}</td>
				<td>{{$candidate->professional_title}}</td>
				<td>{{$candidate->user->email}}</td>
				<td class="action">
					@if ($candidate->resume_file)
					<a href="/documents/resumes/{{$candidate->resume_file}}" target="_blank"><i class="fa fa-download"></i> {{trans('labels.Donwload_Resume_File')}}</a>
					@endif
					<a href="{!!URL::to('jobs/candidates/detail/'.$candidate->id.'')!!}"><i class="fa fa-user"></i> {{trans('labels.View_Candidate')}}</a>
				</td>
			</tr>
			@endforeach
		
		</table>

	</div>

</div>

</div>
<!-- Wrapper / End -->


<div class="margin-top-60"></div>

@endsection