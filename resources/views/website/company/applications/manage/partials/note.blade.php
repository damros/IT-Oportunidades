
<div class="app-tab-content"  id="two-1">

    <input type="hidden" name="id" value="{{$application->id}}"/>
	<div class="form-container">
		{!!Form::textarea('notes',isset($application->notes) ? $application->notes : null,['placeholder'=>trans('labels.Private_note_regarding_this_application')]) !!}
		
		{!!Form::submit(trans('labels.Save'),['class'=>'button margin-top-15'])!!}
	</div>
	
	<div class="notification closeable success form-messages" style="display: none;"></div>	
</div>