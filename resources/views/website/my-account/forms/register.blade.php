<div class="tab-content register-container" id="register" style="display: none; padding: 0px;">

	<h3 class="margin-bottom-10 margin-top-10"><?php echo trans('labels.Register');?></h3>

	<div class="radios margin-bottom-10">
		<input type="radio" value="candidate" name="register" checked><strong>Candidato</strong>
		<input type="radio" value="company" name="register"><strong>Empresa</strong><br>
	</div>
	
	{!!Form::open(['route'=>'candidateRegister', 'method'=>'POST', 'class'=>'register candidate ajax-submit tooltips', 'message-delay'=>'5000'])!!}
		
		<div class="notification closeable success form-messages" style="display: none; margin-top: 0px;"></div>
			
		<div class="form-container">
			<p class="form-row form-row-wide">
				<label for="reg_name">{{trans('labels.NameAndSurname')}}:</label>
				<input type="text" class="input-text" name="name" id="ca_reg_name" value="" />
			</p>

			<p class="form-row form-row-wide">
				<label for="reg_email">{{trans('labels.Email_Address')}}:</label>
				<input type="email" class="input-text" name="email" id="ca_reg_email" value="" />
			</p>

			<p class="form-row form-row-wide">
				<label for="reg_password">{{trans('labels.Password')}}:</label>
				<input type="password" class="input-text" name="password" id="ca_reg_password" />
			</p>

			<p class="form-row form-row-wide">
				<label for="reg_password2">{{trans('labels.Repeat_Password')}}:</label>
				<input type="password" class="input-text" name="password_confirmation" id="ca_reg_password2" />
			</p>

			<p class="form-row">
				<input type="submit" class="button" name="register" value="{{trans('labels.Register')}}" />
			</p>
		</div>

		<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />

	{!!Form::close()!!}
	
	{!!Form::open(['route'=>'companyRegister', 'method'=>'POST', 'class'=>'register company ajax-submit tooltips', 'style'=>'display:none;'])!!}
		<div class="form-container">
			<p class="form-row form-row-wide">
				<label for="reg_name">{{trans('labels.Company_Name')}}:</label>
				<input type="text" class="input-text" name="name" id="co_reg_name" value="" />
			</p>		

			<p class="form-row form-row-wide">
				<label for="reg_cuit">{{trans('labels.Company_Identification')}}:</label>
				<input type="text" class="input-text" name="identification" id="co_reg_cuit" value="" />
			</p>		

			<p class="form-row form-row-wide">
				<label for="reg_email">{{trans('labels.Email_Address')}}:</label>
				<input type="email" class="input-text" name="email" id="co_reg_email" value="" />
			</p>

			<p class="form-row form-row-wide">
				<label for="reg_password">{{trans('labels.Password')}}:</label>
				<input type="password" class="input-text" name="password" id="co_reg_password" />
			</p>

			<p class="form-row form-row-wide">
				<label for="reg_password2">{{trans('labels.Repeat_Password')}}:</label>
				<input type="password" class="input-text" name="password" id="co_reg_password2" />
			</p>

			<p class="form-row">
				<input type="submit" class="button" name="register" value="Register" />
			</p>
		</div>
	
		<div class="notification closeable success form-messages" style="display: none; margin-top: 0px;"></div>	
	
		<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />
		
	{!!Form::close()!!}	
	
</div>
