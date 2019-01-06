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
                <img src="/images/companylogo/{{$job->company->logo}}" title="{{$job->company->name}}"/>
                @else
                <img src="/images/job-list-logo-01.png" alt=""/>
                @endif	
                <div class="content">
                    <h4>{{$job->company->name}}</h4>
                    @if ( $job->company->website )
                    <span><a href="{!! $job->company->website !!}" target="_blank"><i class="fa fa-link"></i> {{$job->company->website}}</a></span>
                    @endif
                    @if ( $job->company->twitter )
                    <span><i class="fa fa-twitter"></i> {{$job->company->twitter}}</span>
                    @endif
                    <p>{{trans('labels.Tags')}}: {{$job->tags}}</p>
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
                            <strong>{{trans('labels.AddressZone')}}:</strong>
                            <span>{{$job->zone->name}}</span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <div>
                            <strong>{{trans('labels.Location')}}:</strong>
                            <span>{{$job->location}}</span>
                        </div>
                    </li>
                    @if ($job->salary)
                    <li>
                        <i class="fa fa-money"></i>
                        <div>
                            <strong>{{trans('labels.Salary')}}:</strong>
                            <span>{{$job->salary}}</span>
                        </div>
                    </li>
                    @endif
                    <li>
                        <i class="fa fa-calendar"></i>
                        <div>
                            <strong>{{trans('labels.Start_Date')}}:</strong>
                            <span>{{$job->start_date}}</span>
                        </div>
                    </li>
                </ul>

                @if ( Auth::guest() || (! Auth::guest() && currentUser()->profile->code == 'ca' ))

                @if ( ! $application )
                <a href="#small-dialog" class="popup-with-zoom-anim button">{{trans('labels.Apply_For_This_Job')}}</a>
                @else
                <div class="notification success" style="text-align: center;">
                    <p><span>{{trans('labels.Application_Already_Sent')}}</span></p>
                </div>                                
                @endif

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
