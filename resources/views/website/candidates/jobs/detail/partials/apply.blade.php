<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
	<div class="small-dialog-headline">
		<h2>{{trans('labels.Apply_For_This_Job')}}</h2>
	</div>

	<div class="small-dialog-content">

		{!!Form::open(['route'=>'candidateJobApply', 'method'=>'POST', 'class'=>'tooltips ajax-submit','files'=>'true'])!!}				
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
			<div class="form-container">
				@if ( ! Auth::check() )				
				<!-- Notice -->
				<div class="notification notice closeable margin-bottom-40">
					<p><span>{{ trans('labels.Have_An_Account')}}?</span> {{ trans('labels.Have_An_Account_Detail') }}</p>
					<p>{{ trans('labels.Apply_For_This_Job_Logged_Out_Legend') }}</p>
				</div>		

				<input type="text" name="name" placeholder="{{trans('labels.Full_Name')}}" value=""/>
				<input type="text" name="email" placeholder="{{trans('labels.Email_Address')}}" value=""/>
				<input type="text" name="identification" placeholder="{{trans('labels.Candidate_Identification')}}" value=""/>
				@endif	

				<textarea name="message" placeholder="{{trans('labels.Job_Apply_Message_Placeholder')}}"></textarea>

				@if ( ! Auth::check() )			
				<!-- Upload CV -->
				<div class="upload-info"><strong>{{trans('labels.Upload_your_CV')}} ({{trans('labels.optional')}})</strong> </div>
				<div class="clearfix"></div>

				<label class="upload-btn">
					<input name="resume_file" class="candidate-application-resume" type="file" />
					<i class="fa fa-upload"></i> {{ trans('labels.Browse') }}
				</label>
				<span class="fake-input candidate-application-resume">{{ trans('labels.No_file_selected') }}</span>
				@endif

				<div class="divider"></div>

				<button class="send">{{trans('labels.Send_Application')}}</button>
			</div>
			
			<input type="hidden" name="job_id" value="{{$job->id}}" />
			
		<div class="notification closeable success margin-top-10 form-messages" style="display: none;"></div>
		
		{!!Form::close()!!}
		
	</div>

</div>