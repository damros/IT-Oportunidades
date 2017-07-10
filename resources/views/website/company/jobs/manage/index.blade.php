@extends('layouts.website')
@section('title')
<title>Administrar Requerimientos - IT Oportunidades</title>
@endsection
@section('content')
	

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2>{{trans('labels.Manage_Jobs')}}</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>{{trans('labels.You_Are_Here')}}:</li>
					<li><a href="/">{{trans('labels.Home')}}</a></li>
					<li>{{trans('labels.Job_Dashboard')}}</li>
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

		<table class="manage-table responsive-table">

			<tr>
				<th><i class="fa fa-file-text"></i> {{ trans('labels.Title') }}</th>
				<th><i class="fa fa-check-square-o"></i> {{ trans('labels.Filled') }}</th>
				<th><i class="fa fa-calendar"></i> {{ trans('labels.Date_Posted') }}</th>
				<th><i class="fa fa-calendar"></i> {{ trans('labels.Date_Expires') }}</th>
				<th><i class="fa fa-user"></i> {{ trans('labels.Applications') }}</th>
				<th><i class="fa fa-user"></i> {{ trans('labels.Job_Matching_Candidates') }}</th>
				<th></th>
			</tr>
			
			@foreach ($jobs as $job)
			<!-- Item #1 -->
			<tr>
				<td class="title">{{$job->title}}</td>
				<td class="centered">{{ ($job->fill_date?: '-')}}</td>
				<td>{{$job->start_date}}</td>
				<td>{{$job->end_date}}</td>
				<td class="centered"><a href="{!!URL::to('applications/manage/'.$job->id.'')!!}" class="button">{{ trans('labels.Show') }} ({{$job->applications->count()}})</a></td>
				<td class="centered"><a href="{!!URL::to('jobs/candidates/find/'.$job->id.'')!!}" class="button">{{ trans('labels.Show') }} ({{$job->applications->count()}})</a></td>				
				<td class="action">
					<a href="{!!URL::to('jobs/edit/'.$job->id.'')!!}"><i class="fa fa-pencil"></i> {{ trans('labels.Edit') }}</a>
				</td>
			</tr>
			@endforeach
		
		</table>

		<br>
		<a href="{!!URL::to('jobs/add')!!}" class="button">{{trans('labels.Add_Job')}}</a>

	</div>

</div>

</div>
<!-- Wrapper / End -->


<div class="margin-top-60"></div>

@endsection