@extends('layouts.website')
@section('title')
<title>Detalle de Candidato - IT Oportunidades</title>
@endsection
@section('content')
	

<!-- Titlebar
================================================== -->
<div id="titlebar" class="resume">
	<div class="container">
		<div class="ten columns">
			<div class="resume-titlebar">
				@if ($candidate->photo)
				<img src="/images/candidatephoto/{{$candidate->photo}}" />
				@else
				<img src="/images/avatar-placeholder.png" alt="">
				@endif
				<div class="resumes-list-content">
					<h4>{{$candidate->name}} <span>{{$candidate->profesional_title}}</span></h4>
					<span class="icons"><i class="fa fa-map-marker"></i> {{$candidate->address}}</span>
					@if ($candidate->website)
					<span class="icons"><a href="{{$candidate->website}}"><i class="fa fa-link"></i> {{$candidate->website}}</a></span>
					@endif
					<span class="icons"><i class="fa fa-envelope"></i> {{$candidate->user->email}}</span>
					<div class="skills">
						@foreach ($candidate->categorys as $candidate_category)
						<span>{{$candidate_category->category->name}}</span>
						@endforeach						
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>

		<div class="six columns">
			<a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Resume</a>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eight columns">
	<div class="padding-right">

		<h3 class="margin-bottom-15">About Me</h3>
		
		<div class="margin-reset">
			{!!$candidate->resume_content!!}
		</div>

		<br>

		<p>The <strong>Food Service Specialist</strong> will have responsibilities that include:</p>

		<ul class="list-1">
			<li>Excellent customer service skills, communication skills, and a happy, smiling attitude are essential.</li>
			<li>Must be available to work required shifts including weekends, evenings and holidays.</li>
			<li>Must be able to perform repeated bending, standing and reaching.</li>
			<li>Must be able to occasionally lift up to 50 pounds</li>
		</ul>

	</div>
	</div>


	<!-- Widgets -->
	<div class="eight columns">

		<h3 class="margin-bottom-20">Education</h3>

		<!-- Resume Table -->
		<dl class="resume-table">
			<dt>
				<small class="date">2012 - 2015</small>
				<strong>Bsc Computing at College of West Anglia</strong>
			</dt>
			<dd>
				<p>Captain, why are we out here chasing comets? Maybe we better talk out here; the observation lounge has turned into a swamp. Ensign Babyface!</p>
			</dd>

		
			<dt>
				<small class="date">2006 - 2010</small>
				<strong>GCSE something at King Edward 7th</strong>
			</dt>
			<dd>
				<p>Captain, why are we out here chasing comets? Maybe we better talk out here; the observation lounge has turned into a swamp. Ensign Babyface!</p>
			</dd>


			<dt>
				<small class="date">2004 - 2006</small>
				<strong>Test 2 at Test</strong>
			</dt>
			<dd>
				<p>Phasellus vestibulum metus orci, ut facilisis dolor interdum eget. Pellentesque magna sem, hendrerit nec elit sit amet, ornare efficitur est.</p>
			</dd>

		</dl>

	</div>

</div>


<!-- Wrapper / End -->


<div class="margin-top-60"></div>

@endsection

@section('scripts')

<!-- WYSIWYG Editor -->
{!!Html::script('scripts/jquery.sceditor.xhtml.min.js')!!}
{!!Html::script('scripts/jquery.sceditor.js')!!}


@endsection