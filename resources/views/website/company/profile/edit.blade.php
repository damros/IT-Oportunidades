@extends('layouts.website')
@section('title')
<title>Editar Perfil - IT Oportunidades</title>
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
    <div class="container">

        <div class="sixteen columns">
            <h2><i class="fa fa-plus-circle"></i> {{trans('labels.Company_Edit')}}</h2>
        </div>

    </div>
</div>	

<!-- Content
================================================== -->
<div class="container">
    <!-- Submit Page -->
    <div class="sixteen columns">

        <div class="submit-page form-company-edit">	

            {!!Form::open(['route'=>'company/edit', 'method'=>'POST', 'class'=>'tooltips ajax-submit', 'files'=>'true'])!!}

            <div class="form-container">
                <!-- Company Name -->
                <div class="form">
                    <h5>{{ trans('labels.Company_Name') }}</h5>
                    <input name="name" type="text" placeholder="{{ trans('labels.Company_Name_Placeholder') }}" value="{{ ( $company->id ? $company->name : "" ) }}">
                </div>

                <!-- Company Identification -->
                <div class="form">
                    <h5>{{ trans('labels.Company_Identification') }}</h5>
                    <input name="identification" type="text" placeholder="{{ trans('labels.Company_Identification_Placeholder') }}" value="{{ ( $company->id ? $company->identification : "" ) }}">
                </div>

                <!-- Company Phone -->
                <div class="form">
                    <h5>{{ trans('labels.Company_Phone') }}</h5>
                    <input name="phone" type="text" placeholder="{{ trans('labels.Company_Phone_Placeholder') }}" value="{{ ( $company->id ? $company->phone : "" ) }}">
                </div>

                <!-- Website -->
                <div class="form">
                    <h5>Website <span>({{ trans('labels.optional') }})</span></h5>
                    <input name="website" type="text" placeholder="http://" value="{{ ( $company->id ? $company->website : "" ) }}">
                </div>

                <!-- Tagline -->
                <div class="form">
                    <h5>{{ trans('labels.Company_Tagline') }} <span>({{ trans('labels.optional') }})</span></h5>
                    <input name="tagline" type="text" placeholder="{{ trans('labels.Company_Tagline_Placeholder') }}" value="{{ ( $company->id ? $company->tagline : "" ) }}">
                </div>

                <!-- Video -->
                <div class="form">
                    <h5>Video <span>({{ trans('labels.optional') }})</span></h5>
                    <input name="video" type="text" placeholder="{{ trans('labels.Company_Video_Placeholder') }}" value="{{ ( $company->id ? $company->video : "" ) }}">
                </div>

                <!-- Twitter -->
                <div class="form">
                    <h5>{{ trans('labels.Twitter_Username') }} <span>({{ trans('labels.optional') }})</span></h5>
                    <input name="twitter" type="text" placeholder="{{ trans('labels.Twitter_Username_Placeholder') }}" value="{{ ( $company->id ? $company->twitter : "" ) }}">
                </div>

                <!-- Logo -->
                <div class="form">
                    <h5>Logo <span>(optional)</span></h5>
                    <label class="upload-btn">
                        <input name="logo" type="file" class="company-logo" />
                        <i class="fa fa-upload"></i> {{ trans('labels.Browse') }}
                    </label>
                    <span class="fake-input company-logo">{{ trans('labels.No_file_selected') }}</span>
                </div>

                @if ( currentUser()->company->logo )
                <div class="form">
                    <img src="/images/companylogo/{{currentUser()->company->logo}}" alt="" style="width: 200px; height: 200px;"/>
                </div>
                @endif

                <!-- Description -->
                <div class="form">
                    <h5>{{ trans('labels.Company_Profile_Detail') }}</h5>
                    <textarea class="WYSIWYG" name="profile_detail" cols="40" rows="3" id="summary" spellcheck="true">{{ ( $company->id ? $company->profile_detail : "" ) }}</textarea>
                </div>			

                <input type="hidden" name="id" value="{{$company->id}}"/>
                <input type="hidden" value="{{ csrf_token() }}" id="token" />

                <p class="form-row">
                    <a href="#" class="button big margin-top-5 save">{{ trans('labels.Save') }}  <i class="fa fa-arrow-circle-right"></i></a>
                </p>
            </div>

            <div class="notification closeable success form-messages" style="display: none;"></div>	

            {!!Form::close()!!}

        </div>

    </div>
</div>

<div class="margin-top-60"></div>

@endsection