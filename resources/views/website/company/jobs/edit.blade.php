@extends('layouts.website')
@section('title')
<title>Editar Requerimiento - IT Oportunidades</title>
@endsection
@section('content')
	

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> {{trans('labels.Edit_Job')}}</h2>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Submit Page -->
	<div class="sixteen columns">
		
		<div class="submit-page form-company-job">
			
			{!!Form::open(['route'=>'jobs/edit', 'method'=>'POST', 'class'=>'tooltips', 'files'=>'true'])!!}			

			@include('website.company.jobs.forms.job')
				
			<input type="hidden" name="id" value="{{$job->id}}"/>
			<input type="hidden" name="company_id" value="{{$job->company_id}}"/>
			
			{!!Form::close()!!}
			
		</div>

		<div class="notification closeable success" id="form-messages" style="display: none;"></div>
		
	</div>

</div>


<!-- Footer
================================================== -->
<div class="margin-top-60"></div>

@endsection

@section('scripts')

<!-- WYSIWYG Editor -->
{!!Html::script('scripts/jquery.sceditor.xhtml.min.js')!!}
{!!Html::script('scripts/jquery.sceditor.js')!!}


@endsection