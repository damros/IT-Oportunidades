@extends('layouts.website')
@section('title')
<title>IT Oportunidades</title>
@endsection
@section('content')


<!-- Slider
================================================== -->
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<ul>

			<!-- Slide 1 -->
			<li data-fstransition="fade" data-transition="fade" data-slotamount="10" data-masterspeed="300">
				{{ Html::image('images/banner-home-01.jpg','')}}

				<div class="caption title sfb" data-x="0" data-y="165" data-speed="400" data-start="800"  data-easing="easeOutExpo">
					<h2>{{trans('labels.Home_Slide_1_Title')}}</h2>
				</div>

				<div class="caption text sfb" data-x="0" data-y="240" data-speed="400" data-start="1200" data-easing="easeOutExpo">
					<p>{!! trans('labels.Home_Slide_1_Detail') !!}</p>
				</div>

				<div class="caption sfb" data-x="0" data-y="370" data-speed="400" data-start="1600" data-easing="easeOutExpo">
					<a href="{!!URL::to('my-account')!!}" class="slider-button">{{trans('labels.Get_Started')}}</a>
				</div>
			</li>

			<!-- Slide 2 -->
			<li data-transition="slideup" data-slotamount="10" data-masterspeed="800">

				{{ Html::image('images/banner-home-02.jpg','')}}

				<div class="caption title sfb" data-x="center" data-y="165" data-speed="400" data-start="800"  data-easing="easeOutExpo">
					<h2>{{trans('labels.Home_Slide_2_Title')}}</h2>
				</div>

				<div class="caption text align-center sfb" data-x="center" data-y="240" data-speed="400" data-start="1200" data-easing="easeOutExpo">
					<p>{!! trans('labels.Home_Slide_2_Detail') !!}</p>
				</div>

				<div class="caption sfb" data-x="center" data-y="370" data-speed="400" data-start="1600" data-easing="easeOutExpo">
					@if ( Auth::guest() || (currentUser()->profile->code == 'co'))
						<a href="{!!URL::to('jobs/add')!!}" class="slider-button">{{trans('labels.Hire')}}</a>
					@endif
					@if ( Auth::guest() || (currentUser()->profile->code == 'ca'))
						<a href="{!!URL::to('jobs/browse')!!}" class="slider-button">{{trans('labels.Work')}}</a>
					@endif
				</div>
			</li>

		</ul>
	</div>
</div>

<div class="container">
	
	<!-- Recent Jobs -->
	<div class="sixteen columns">
	<div class="padding-right">
		<h3 class="margin-bottom-25">{{trans('labels.Recent_Jobs')}}</h3>
		<ul class="job-list">
			
			@foreach ($recentjobs as $job)

			<li><a href="{!!URL::to('jobs/'.$job->id.'')!!}">
				@if ( $job->company->logo )
					<img src="/images/companylogo/{{$job->company->logo}}" title="{{$job->company->name}}" style="width: 90px; height: 90px; margin-right: 10px;"/>
				@else
					<img src="/images/job-list-logo-01.png" alt="" style="width: 90px; height: 90px; margin-right: 10px;"/>
				@endif				
				<div class="job-list-content">
					<h4>{{$job->title}}</h4>
					<div class="job-icons">
						<span><i class="fa fa-briefcase"></i> {{$job->company->name}}</span>
						<span><i class="fa fa-map-marker"></i> {{$job->location}}</span>
						<span><i class="fa fa-clock-o"></i> {{$job->created_at->diffForHumans()}}</span>
					</div>
				</div>
				</a>
				<div class="clearfix"></div>
			</li>				

			@endforeach			

		</ul>

		<a href="{!!URL::to('jobs/browse')!!}" class="button centered"><i class="fa fa-plus-circle"></i> {{trans('labels.Show_More_Jobs')}}</a>
		<div class="margin-bottom-55"></div>
	</div>
	</div>
	
</div>


<!-- Counters -->
<div id="counters">
	<div class="container">

		<div class="five columns">
			<div class="counter-box">
				<span class="counter">{{$jobcount}}</span>
				<p>{{trans('labels.Jobs_Count')}}</p>
			</div>
		</div>

		<div class="five columns">
			<div class="counter-box">
				<span class="counter">{{$candidatecount}}</span>
				<p>{{trans('labels.Candidates_Count')}}</p>
			</div>
		</div>

		<div class="five columns">
			<div class="counter-box">
				<span class="counter">{{$companycount}}</span>
				<p>{{trans('labels.Companys_Count')}}</p>
			</div>
		</div>

	</div>
</div>

<!-- Clients Carousel -->
<h3 class="centered-headline">{!! trans('labels.Clients_Who_Have_Trusted_Us') !!}</h3>
<div class="clearfix"></div>

<div class="container">

	<div class="sixteen columns">

		<!-- Navigation / Left -->
		<div class="one carousel column"><div id="showbiz_left_2" class="sb-navigation-left-2"><i class="fa fa-angle-left"></i></div></div>

		<!-- ShowBiz Carousel -->
		<div id="our-clients" class="showbiz-container fourteen carousel columns" >

		<!-- Portfolio Entries -->
		<div class="showbiz our-clients" data-left="#showbiz_left_2" data-right="#showbiz_right_2">
			<div class="overflowholder">

				<ul>
					<!-- Item -->
					@foreach ($logos as $logo)
					<li><img src="images/companylogo/{{$logo->logo}}" alt="{{$logo->name}}" title="{{$logo->name}}" /></li>
					@endforeach	
				</ul>
				<div class="clearfix"></div>

			</div>
			<div class="clearfix"></div>

		</div>
		</div>

		<!-- Navigation / Right -->
		<div class="one carousel column"><div id="showbiz_right_2" class="sb-navigation-right-2"><i class="fa fa-angle-right"></i></div></div>

	</div>

</div>

@endsection