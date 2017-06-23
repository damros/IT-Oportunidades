<div class="app-tab-content" id="one-1">
	<div class="form-container">
		<div class="select-grid">
			<input type="hidden" name="id" value="{{$application->id}}"/>
			{!!Form::select('applicationStatus_Id',$applicationStatus,isset($application->application_status_id) ? $application->application_status_id : null,['id'=>'applicationStatus','class'=>'chosen-select-no-single','placeholder'=>trans('labels.Application_Status')]) !!}
		</div>

		<div class="select-grid">
			{!!Form::number('rating',isset($application->rating) ? $application->rating : null,['class'=>'form-control','placeholder'=>'Rating (de 5)','type'=>'number','min'=>'1','max'=>'5'])!!}
		</div>

		<div class="clearfix"></div>
		{!!Form::submit(trans('labels.Save'),['class'=>'button margin-top-15'])!!}
	</div>
	<div class="notification closeable success form-messages" style="display: none;"></div>	
</div>
