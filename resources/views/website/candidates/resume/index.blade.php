@extends('layouts.website')
@section('title')
<title>Carga de Currículum - IT Oportunidades</title>
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> {{trans('labels.Resume')}}</h2>
		</div>

	</div>
</div>	

<!-- Content
================================================== -->
<div class="container">

	<!-- Submit Page -->
	<div class="sixteen columns">

		<div class="submit-page form-candidate-resume" data-href="candidateUpdate">

			{!!Form::open(['route'=>'resume', 'method'=>'POST', 'class'=>'tooltips','files'=>'true'])!!}	

			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />

			@if ( ! Auth::check() )
			<!-- Notice -->
			<div class="notification notice closeable margin-bottom-40">
				<p><span>{{ trans('labels.Have_An_Account')}}?</span> {{ trans('labels.Have_An_Account_Detail') }}</p>
			</div>

			<!-- Email -->
			<div class="form">
				<h5>{{ trans('labels.Your_Email') }}</h5>
				<input name="email" class="search-field" type="text" placeholder="{{trans('labels.Email_Placeholder')}}" value=""/>
			</div>								
			@endif

			<!-- Name -->
			<div class="form">
				<h5>{{ trans('labels.Your_Name') }}</h5>
				<input name="name" class="search-field" type="text" placeholder="{{ trans('labels.Your_Full_Name') }}" value="{{ (currentUser() ? currentUser()->candidate->name : "") }}"/>
			</div>

			<!-- Identification -->
			<div class="form">
				<h5>{{ trans('labels.Candidate_Identification') }}</h5>
				<input name="identification" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Identification_Placeholder')}}" value="{{ (currentUser() ? currentUser()->candidate->identification : "") }}"/>
			</div>

			<!-- Phone -->
			<div class="form">
				<h5>{{ trans('labels.Candidate_Phone') }}</h5>
				<input name="phone" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Phone_Placeholer')}}" value="{{ (currentUser() ? currentUser()->candidate->phone : "") }}"/>
			</div>

			<!-- Title -->
			<div class="form">
				<h5>{{trans('labels.Candidate_Professional_Title')}}</h5>
				<input name="profesional_title" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Professional_Title_Placeholder')}}" value="{{ (currentUser() ? currentUser()->candidate->profesional_title : "") }}"/>
			</div>

			<!-- Choose Preferred Category -->
			<div class="form">
				<div class="select">
					<h5>{{ trans('labels.Candidate_Preferred_Categorys') }}</h5>
					<select name="preferred_category[]" data-placeholder="{{trans('labels.Candidate_Preferred_Categorys_Placeholder')}}" class="chosen-select" multiple>							
						@foreach ($categorys as $category)						
						<option value="{{$category->id}}" <?php echo ((in_array($category->id, $pref_cats) ? " selected='selected'" : "")) ?> >{{$category->full_name}}</option>
						@endforeach							
					</select>
				</div>
			</div>				

			<!-- Choose Category -->
			<div class="form">
				<div class="select">
					<h5>{{ trans('labels.Candidate_Categorys') }}</h5>
					<select name="category[]" data-placeholder="{{trans('labels.Candidate_Categorys_Placeholder')}}" class="chosen-select" multiple>							
						@foreach ($categorys as $category)
						<option value="{{$category->id}}" <?php echo ((in_array($category->id, $cats) ? " selected='selected'" : "")) ?> >{{$category->full_name}}</option>
						@endforeach							
					</select>
				</div>
			</div>				

			<!-- Location -->
			<div class="form">
				<h5>{{trans('labels.Candidate_Location')}}</h5>
				<input name="address" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Location_Placeholder')}}" value="{{ (currentUser() ? currentUser()->candidate->address : "") }}"/>
			</div>

			<!-- Photo -->
			<div class="form">
				<h5>{{trans('labels.Candidate_Photo')}} <span>({{trans('labels.optional')}})</span></h5>
				<label class="upload-btn">
					<input name="photo" class="candidate-photo" type="file" />
					<i class="fa fa-upload"></i> {{ trans('labels.Browse') }}
				</label>
				<span class="fake-input candidate-photo">{{ trans('labels.No_file_selected') }}</span>
			</div>

			@if ( Auth::check() )
				
					<div class="form">
						<img src="/images/candidatephoto/{{currentUser()->candidate->photo_candidate}}" alt="" style="width: 200px; height: 200px;"/>
					</div>
				
			@endif

			<!-- Video -->
			<div class="form">
				<h5>{{trans('labels.Candidate_Video')}} <span>({{trans('labels.optional')}})</span></h5>
				<input name="video" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Video_Placeholder')}}" value="{{ (currentUser() ? currentUser()->candidate->video : "") }}"/>
			</div>

			<!-- Description -->
			<div class="form">
				<h5>{{trans('labels.Resume_Content')}}</h5>
				<textarea class="WYSIWYG" id="resume_content" name="resume_content" cols="40" rows="3" spellcheck="true">{{ (currentUser() ? currentUser()->candidate->resume_content : "") }}</textarea>
			</div>

			<!-- Resume File -->

			<div class="form">
				<h5>{{trans('labels.Resume_File')}}</h5>

				<label class="upload-btn">
					<input name="resume_file" class="candidate-resume" type="file" />
					<i class="fa fa-upload"></i> {{ trans('labels.Browse') }}
				</label>

				<span class="fake-input candidate-resume">

					@if ( Auth::check() )
						@if ( currentUser()->candidate->resume_file )
							{{currentUser()->candidate->resume_file}}
						@else   
							{{ trans('labels.No_file_selected') }}
						@endif
					@else
						{{ trans('labels.No_file_selected') }}
					@endif
				</span>
				@if ( Auth::check() )
					@if ( currentUser()->candidate->resume_file )
						<div class="form" style="width: 75px; height: 75px;" title="Descargar Curriculum">
							<a href="/documents/resumes/{{currentUser()->candidate->resume_file}}" target="{{currentUser()->candidate->id}}"  >
								<img src="images/download.png" style="width: 75px; height: 75px;"/>
							</a>
						</div>
					@endif
				@endif
			</div>




			<!-- Add URLs -->
			<div class="form with-line candidate-urls">
				<h5>URL(s) <span>({{trans('labels.optional')}})</span></h5>
				<div class="form-inside">

					<!-- Adding URL(s) -->
					<div class="form boxed box-to-clone url-box">
						<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
						<input name="url_name[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_URL_Name')}}" value=""/>
						<input name="url_path[]" class="search-field" type="text" placeholder="http://" value=""/>
						<input name="url_reg[]" class="search-field regfield" type="hidden" value="0"/>
					</div>					

					@if (Auth::check())
						@foreach (currentUser()->candidate->urls as $url)
							<div class="form boxed url-box box-loaded">
								<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
								<input name="url_name[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_URL_Name')}}" value="{{ $url->name }}"/>
								<input name="url_path[]" class="search-field" type="text" placeholder="http://" value="{{ $url->url }}"/>
								<input name="url_reg[]" class="search-field regfield" type="hidden" value="1"/>									
							</div>								
						@endforeach
					@endif

					<a href="#" class="button gray add-url add-box"><i class="fa fa-plus-circle"></i> {{trans('labels.Add_URL')}}</a>
					<p class="note">{{trans('labels.Candidate_URLs_Note')}}</p>
				</div>
			</div>


			<!-- Education -->
			<div class="form with-line">
				<h5>{{trans('labels.Candidate_Education')}} <span>({{trans('labels.optional')}})</span></h5>
				<div class="form-inside">
					<!-- Add Education -->
					<div class="form boxed box-to-clone education-box">
						<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
						<input name="education_name[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Education_School_Name')}}" value=""/>
						<input name="education_qualification[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Education_Qualifications')}}" value=""/>
						<input name="education_dates[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Education_Dates')}}" value=""/>
						<textarea name="education_notes[]" id="desc" cols="30" rows="10" placeholder="{{trans('labels.Candidate_Education_Notes')}}"></textarea>
						<input name="education_reg[]" class="search-field regfield" type="hidden" value="0"/>							
					</div>

					@if (Auth::check())
						@foreach (currentUser()->candidate->educations as $education)
							<div class="form boxed box-to-clone url-box box-loaded">
								<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
								<input name="education_name[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Education_School_Name')}}" value="{{ $education->school_name }}"/>
								<input name="education_qualification[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Education_Qualifications')}}" value="{{ $education->qualifications }}"/>
								<input name="education_dates[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Education_Dates')}}" value="{{ $education->edates }}"/>
								<textarea name="education_notes[]" id="desc" cols="30" rows="10" placeholder="{{trans('labels.Candidate_Education_Notes')}}">{{ $education->notes }}</textarea>
								<input name="education_reg[]" class="search-field regfield" type="hidden" value="1"/>							
							</div>								
						@endforeach
					@endif						

					<a href="#" class="button gray add-education add-box"><i class="fa fa-plus-circle"></i> {{trans('labels.Add_Education')}}</a>
				</div>
			</div>


			<!-- Experience  -->
			<div class="form with-line">
				<h5>{{trans('labels.Candidate_Experience')}} <span>({{trans('labels.optional')}})</span></h5>
				<div class="form-inside">
					<!-- Add Experience -->
					<div class="form boxed box-to-clone experience-box">
						<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
						<input name="experience_employeer[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Experience_Employeer')}}" value=""/>
						<input name="experience_title[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Experience_Job_Title')}}" value=""/>
						<input name="experience_dates[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Experience_Dates')}}" value=""/>
						<textarea name="experience_notes[]" id="desc1" cols="30" rows="10" placeholder="{{trans('labels.Candidate_Experience_Notes')}}"></textarea>
						<input name="experience_reg[]" class="search-field regfield" type="hidden" value="0"/>							
					</div>

					@if (Auth::check())
						@foreach (currentUser()->candidate->experiences as $experience)
							<div class="form boxed box-to-clone url-box box-loaded">
								<a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
								<input name="experience_employeer[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Experience_Employeer')}}" value="{{ $experience->employeer }}"/>
								<input name="experience_title[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Experience_Job_Title')}}" value="{{ $experience->job_title }}"/>
								<input name="experience_dates[]" class="search-field" type="text" placeholder="{{trans('labels.Candidate_Experience_Dates')}}" value="{{ $experience->edates }}"/>
								<textarea name="experience_notes[]" id="desc1" cols="30" rows="10" placeholder="{{trans('labels.Candidate_Experience_Notes')}}">{{ $experience->notes }}</textarea>
								<input name="experience_reg[]" class="search-field regfield" type="hidden" value="1"/>							
							</div>								
						@endforeach
					@endif

					<a href="#" class="button gray add-experience add-box"><i class="fa fa-plus-circle"></i> {{trans('labels.Add_Experience')}}</a>
				</div>
			</div>


			<div class="divider margin-top-0 padding-reset"></div>

			<a href="#" class="button big margin-top-5 save-candidate">{{ trans('labels.Save') }} <i class="fa fa-arrow-circle-right"></i></a>

			{!!Form::close()!!}

		</div>

		<div class="notification closeable success" id="form-messages" style="display: none;"></div>

	</div>

</div>

<div class="margin-top-60"></div>

@endsection

@section('scripts')

<!-- WYSIWYG Editor -->
{!!Html::script('scripts/jquery.sceditor.xhtml.min.js')!!}
{!!Html::script('scripts/jquery.sceditor.js')!!}


@endsection