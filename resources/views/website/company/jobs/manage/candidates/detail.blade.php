@extends('layouts.website')
@section('title')
<title>Detalle de Candidato - IT Oportunidades</title>
@endsection
@section('content')
	

<!-- Titlebar
================================================== -->
<div id="titlebar" class="resume">
	<div class="container">
		<div class="sixteen columns">
			<div class="resume-titlebar">
				<img src="{{$candidate->photo_candidate}}" />
				<div class="resumes-list-content">
					<h4>{{$candidate->name}} <span>{{$candidate->profesional_title}}</span></h4>
					<span class="icons"><i class="fa fa-map-marker"></i> {{$candidate->address}}</span>
					@if ($candidate->website)
					<span class="icons"><a href="{{$candidate->website}}"><i class="fa fa-link"></i> {{$candidate->website}}</a></span>
					@endif
					<span class="icons"><i class="fa fa-envelope"></i> {{$candidate->user->email}}</span>
					@if ($candidate->resume_file)
					<span class="icons"><a href="/documents/resumes/{{$candidate->resume_file}}" target="_blank"><i class="fa fa-download"></i> {{trans('labels.Donwload_Resume_File')}}</a></span>
					@endif					
					<div class="skills">
						@foreach ($candidate->categorys as $candidate_category)
						<span>{{$candidate_category->category->full_name}}</span>
						@endforeach						
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>
		<!--
		<div class="six columns">
			<a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Resume</a>
		</div>
		-->
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eight columns">
		<div class="padding-right">

			<p><strong>{{trans('words.Identification')}}:</strong> {{$candidate->identification}}</p>
			<p><strong>{{trans('words.Phone')}}:</strong> {{$candidate->phone}}</p>
			@if ($candidate->video)
			<p><strong>{{trans('words.Video')}}:</strong> {{$candidate->video}}</p>
			@endif

			@if ($candidate->urls->count())
			<p><strong>{{trans('words.Urls')}}</strong></p>

			<ul class="list-1">
				@foreach ($candidate->urls as $url)
				<li><strong>{{$url->name}}</strong>: {{$url->url}}</li>
				@endforeach
			</ul>
			@endif

			<br>

			<h3 class="margin-bottom-15">{{trans('labels.Resume_Detail')}}</h3>

			<div class="margin-reset">
				{!!$candidate->resume_content!!}
			</div>		

		</div>
	</div>


	<!-- Widgets -->
	<div class="eight columns">

		<h3 class="margin-bottom-20">{{trans('words.Education')}}</h3>

		<!-- Resume Table -->
		<dl class="resume-table">
			@foreach ($candidate->educations as $education)
			<dt>
				<small class="date">{{$education->edates}}</small>
				<strong>{{$education->school_name}}</strong>
			</dt>
			<dd>
				<p>{{$education->notes}}</p>
			</dd>
			@endforeach

		</dl>
		
		<h3 class="margin-bottom-20">{{trans('words.Experience')}}</h3>		

		<!-- Resume Table -->
		<dl class="resume-table">
			@foreach ($candidate->experiences as $experience)
			<dt>
				<small class="date">{{$experience->edates}}</small>
				<strong>{{$experience->employeer}}</strong>
			</dt>
			<dd>
				<p>{{$experience->job_title}}</p>
				<p>{{$experience->notes}}</p>
			</dd>
			@endforeach

		</dl>

	</div>

</div>


<!-- Wrapper / End -->


<div class="margin-top-60"></div>

@endsection