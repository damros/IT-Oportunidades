<ul class="job-list full">
				
	@foreach ($jobs as $job)

	<li><a href="{!!URL::to('jobs/'.$job->id.'')!!}">
		@if ( $job->company->logo )
			<img src="/images/companylogo/{{$job->company->logo}}" title="{{$job->company->name}}"/>
		@else
			<img src="/images/job-list-logo-01.png" alt=""/>
		@endif		
		<div class="job-list-content">
			<h4>{{$job->title}}</h4>
			<div class="job-icons">
				<span><i class="fa fa-briefcase"></i> {{$job->company->name}}</span>
                                @if ($job->location)
				<span><i class="fa fa-map-marker"></i> {{$job->location}}</span>
                                @endif
				<span><i class="fa fa-hourglass-half"></i> {{$job->type->name}}</span>
				@if ($job->end_date)
				<span><i class="fa fa-calendar-times-o"></i> {{$job->end_date}}</span>
				@endif
				@if ($job->salary)
				<span><i class="fa fa-money"></i> {{$job->salary}}</span>
				@endif
				<span><i class="fa fa-clock-o"></i> {{$job->created_at->diffForHumans()}}</span>				
			</div>
			<p>{{trans('labels.Tags')}}: {{$job->tags}}</p>
		</div>
		</a>
		<div class="clearfix"></div>
	</li>				

	@endforeach

</ul>

<div class="clearfix"></div>

<div class="pagination-container">
	<nav class="pagination">
		<ul>
			@for ($x = 1; ($x <= $jobs->lastPage() && $x < 10); $x++)
				<li><a href="{{$jobs->url($x)}}" class="{{($jobs->currentPage() == $x ? "current-page" : "")}}">{{($x)}}</a></li>
			@endfor	
			@if ($jobs->lastPage() > 13)
				<li class="blank">...</li>
				@for ($x = ($jobs->lastPage() - 2); $x <= $jobs->lastPage(); $x++)
					<li><a href="{{$jobs->url($x)}}" class="{{($jobs->currentPage() == $x ? "current-page" : "")}}">{{($x)}}</a></li>
				@endfor
			@endif
		</ul>
	</nav>
	<nav class="pagination-next-prev">
		<ul>
			<li><a href="{{$jobs->previousPageUrl()}}" class="prev">{{trans('labels.Previous')}}</a></li>
			<li><a href="{{$jobs->nextPageUrl()}}" class="next">{{trans('labels.Next')}}</a></li>
		</ul>
	</nav>
</div>