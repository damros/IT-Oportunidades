@if ( ! Auth::check() )
<!-- Notice -->
<div class="notification notice closeable margin-bottom-40">
    <p><span>{{ trans('labels.Have_An_Account') }}?</span> {{ trans('labels.Have_An_Account_Detail')}} </p>
</div>

<!-- Email -->
<div class="form">
    <h5>{{ trans('labels.Your_Email') }}</h5>
    <input name="email" class="search-field" type="text" placeholder="{{trans('labels.Email_Placeholder')}}" value=""/>
</div>
@endif

<!-- Title -->
<div class="form">
    <h5>{{ trans('labels.Job_Title') }}</h5>
    <input name="title" class="search-field" type="text" placeholder="{{trans('labels.Job_Title_Placeholder')}}" value="{{ ( $job->id ? $job->title : "" ) }}"/>
</div>

<!-- Location -->
<div class="form">
    <h5>{{ trans('labels.Location') }} <span>({{ trans('labels.optional') }})</span></h5>
    <input name="location" class="search-field" type="text" placeholder="{{trans('labels.Location_Placeholder')}}" value="{{ ( $job->id ? $job->location : "" ) }}"/>
    <p class="note">{{trans('labels.Location_Note')}}</p>
</div>

<!-- Job Type -->
<div class="form">
    <h5>{{ trans('labels.Job_Type') }}</h5>
    <select name="job_type_id" class="chosen-select-no-single">							
        @foreach ($jobtypes as $jobtype)
        <option value="{{$jobtype->id}}" <?php echo (($job->job_type_id == $jobtype->id) ? " selected='selected'" : "") ?> >{{$jobtype->name}}</option>
        @endforeach							
    </select>				
</div>

<!-- Choose Principal Category -->
<div class="form">
    <div class="select">
        <h5>{{ trans('labels.Principal_Category') }}</h5>
        <select name="principal_category" data-placeholder="{{trans('labels.Principal_Category_Placeholder')}}" class="chosen-select">
            <option value="">{{trans('labels.Principal_Category_Placeholder')}}</option>							
            @foreach ($categorys as $category)
            <option value="{{$category->id}}" <?php echo (($category->id == intval($princ_cat)) ? " selected='selected'" : "") ?> >{{$category->full_name}}</option>
            @endforeach							
        </select>
    </div>
</div>

<!-- Choose Additional Categorys -->
<div class="form">
    <div class="select">
        <h5>{{ trans('labels.Additional_Categorys') }}</h5>
        <select name="category[]" data-placeholder="{{trans('labels.Additional_Categorys_Placeholder')}}" class="chosen-select" multiple>							
            @foreach ($categorys as $category)
            <option value="{{$category->id}}" <?php echo ((in_array($category->id, $cats) ? " selected='selected'" : "")) ?> >{{$category->full_name}}</option>
            @endforeach							
        </select>
    </div>
</div>

<!-- Tags -->
<div class="form">
    <h5>{{ trans('labels.Job_Tags') }} <span>({{ trans('labels.optional') }}) </span></h5>
    <input name="tags" class="search-field" type="text" placeholder="{{trans('labels.Job_Tags_Placeholder')}}" value="{{ ( $job->id ? $job->tags : "" ) }}"/>
    <p class="note">{{ trans('labels.Job_Tags_Note') }}</p>
</div>

<!-- Description -->
<div class="form">
    <h5>{{ trans('labels.Description') }}</h5>
    <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true">{{ ( $job->id ? $job->description : "" ) }}</textarea>
</div>

<!-- Job Salary -->
<div class="form">
    <h5>{{ trans('labels.Job_Salary') }}</h5>
    <input name="salary" type="text" placeholder="{{ trans('labels.Job_Salary_Placeholder') }}" value="{{ ( $job->id ? $job->salary : "" ) }}">
</div>

<!-- Start Date -->
<div class="form">
    <h5>{{ trans('labels.Job_Start_Date') }}</h5>
    <input name="start_date" data-role="date" id="datepicker" class="date" type="text" placeholder="{{ trans('labels.date_placeholder') }}" value="{{ ( $job->id ? $job->start_date : "" ) }}">
</div>

<!-- Closing Date -->
<div class="form">
    <h5>{{ trans('labels.Job_Closing_Date') }} <span>({{ trans('labels.optional') }})</span></h5>
    <input name="end_date" data-role="date" class="date" type="text" placeholder="{{ trans('labels.date_placeholder') }}" value="{{ ( $job->id ? $job->end_date : "" ) }}">
</div>

@if ( $job->id )
<!-- Fill Date -->
<div class="form">
    <h5>{{ trans('labels.Job_Fill_Date') }} <span>({{ trans('labels.optional') }})</span></h5>
    <input name="fill_date" data-role="date" class="date" type="text" placeholder="{{ trans('labels.date_placeholder') }}" value="{{ ( $job->id ? $job->fill_date : "" ) }}">
</div>			
@endif

@if ( ! Auth::check() )
<!-- Company Details -->
<div class="divider"><h3>{{ trans('labels.Company_Details') }}</h3></div>

<!-- Company Name -->
<div class="form">
    <h5>{{ trans('labels.Company_Name') }}</h5>
    <input name="name" type="text" placeholder="{{ trans('labels.Company_Name_Placeholder') }}">
</div>

<!-- Company Identification -->
<div class="form">
    <h5>{{ trans('labels.Company_Identification') }}</h5>
    <input name="identification" type="text" placeholder="{{ trans('labels.Company_Identification_Placeholder') }}">
</div>

<!-- Company Phone -->
<div class="form">
    <h5>{{ trans('labels.Company_Phone') }}</h5>
    <input name="phone" type="text" placeholder="{{ trans('labels.Company_Phone_Placeholder') }}">
</div>

<!-- Website -->
<div class="form">
    <h5>Website <span>({{ trans('labels.optional') }})</span></h5>
    <input name="website" type="text" placeholder="http://">
</div>

<!-- Tagline -->
<div class="form">
    <h5>{{ trans('labels.Company_Tagline') }} <span>({{ trans('labels.optional') }})</span></h5>
    <input name="tagline" type="text" placeholder="{{ trans('labels.Company_Tagline_Placeholder') }}">
</div>

<!-- Video -->
<div class="form">
    <h5>Video <span>({{ trans('labels.optional') }})</span></h5>
    <input name="video" type="text" placeholder="{{ trans('labels.Company_Video_Placeholder') }}">
</div>

<!-- Twitter -->
<div class="form">
    <h5>{{ trans('labels.Twitter_Username') }} <span>({{ trans('labels.optional') }})</span></h5>
    <input name="twitter" type="text" placeholder="{{ trans('labels.Twitter_Username_Placeholder') }}">
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

<!-- Description -->
<div class="form">
    <h5>{{ trans('labels.Company_Profile_Detail') }}</h5>
    <textarea class="WYSIWYG" name="profile_detail" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
</div>			

@endif

<input type="hidden" value="{{ csrf_token() }}" id="token" />			

<div class="divider margin-top-0"></div>

<a href="#" class="button big margin-top-5 save-job">{{ trans('labels.Save') }}  <i class="fa fa-arrow-circle-right"></i></a>
