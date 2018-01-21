<div class="tab-content" id="login" style="display: none; padding: 0px;">

	<h3 class="margin-bottom-10 margin-top-10">{{ trans('labels.Login') }}</h3>

	{!!Form::open(['route'=>'webLogin', 'method'=>'POST', 'class'=>'ajax-submit tooltips'])!!}		

		<div class="notification closeable success form-messages" style="display: none; margin-top: 0px;"></div>			
		
		<div class="form-container">
			<p class="form-row form-row-wide">
				<label for="email">{{ trans('labels.Email_Address') }}:
                                <i class="ln ln-icon-Male"></i>
				<input type="email" class="input-text" name="email" id="email" value="" />
                                </label>
			</p>

			<p class="form-row form-row-wide">
				<label for="password">{{ trans('labels.Password') }}:
                                <i class="ln ln-icon-Lock-2"></i>
				<input class="input-text" type="password" name="password" id="password" />
                                </label>
			</p>

			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />

			<p class="form-row">
				<input type="submit" class="button" name="login" value="Ingresar" />

				<label for="rememberme" class="rememberme">
				<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> {{ trans('labels.Remember_Me') }} </label>
			</p>
		</div>
				
		<p class="lost_password">
			<a href="{!!URL::to('password')!!}" >{{ trans('labels.Lost_Your_Password') }}?</a>
		</p>
		
	{!!Form::close()!!}
	
</div>