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
				<label for="ca_reg_name">{{trans('labels.NameAndSurname')}}:
                                <i class="ln ln-icon-Male"></i>
				<input type="text" class="input-text" name="name" id="ca_reg_name" value="" />
                                </label>
			</p>

			<p class="form-row form-row-wide">
				<label for="ca_reg_email">{{trans('labels.Email_Address')}}:
                                <i class="ln ln-icon-Mail"></i>
				<input type="email" class="input-text" name="email" id="ca_reg_email" value="" />
                                </label>
			</p>

			<p class="form-row form-row-wide">
				<label for="ca_reg_password">{{trans('labels.Password')}}:
                                <i class="ln ln-icon-Lock-2"></i>
				<input type="password" class="input-text" name="password" id="ca_reg_password" />
                                </label>
			</p>

			<p class="form-row form-row-wide">
				<label for="ca_reg_password2">{{trans('labels.Repeat_Password')}}:
                                <i class="ln ln-icon-Lock-2"></i>
				<input type="password" class="input-text" name="password_confirmation" id="ca_reg_password2" />
                                </label>
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
				<label for="co_reg_name">{{trans('labels.Company_Name')}}:
                                <i class="ln ln-icon-Male"></i>
				<input type="text" class="input-text" name="name" id="co_reg_name" value="" />
                                </label>
			</p>		

			<p class="form-row form-row-wide">
				<label for="reg_cuit">{{trans('labels.Company_Identification')}}:
                                <i class="ln ln-icon-Notepad-2"></i>
				<input type="text" class="input-text" name="identification" id="co_reg_cuit" value="" />
                                </label>
			</p>		

			<p class="form-row form-row-wide">
				<label for="reg_email">{{trans('labels.Email_Address')}}:
                                <i class="ln ln-icon-Mail"></i>
				<input type="email" class="input-text" name="email" id="co_reg_email" value="" />
                                </label>
			</p>

			<p class="form-row form-row-wide">
				<label for="reg_password">{{trans('labels.Password')}}:
                                <i class="ln ln-icon-Lock-2"></i>
				<input type="password" class="input-text" name="password" id="co_reg_password" />
                                </label>
			</p>

			<p class="form-row form-row-wide">
				<label for="reg_password2">{{trans('labels.Repeat_Password')}}:
                                <i class="ln ln-icon-Lock-2"></i>
				<input type="password" class="input-text" name="password_confirmation" id="co_reg_password2" />
                                </label>
			</p>

			<p class="form-row">
				<input type="submit" class="button" name="register" value="{{trans('labels.Register')}}" />
			</p>
		</div>
	
		<div class="notification closeable success form-messages" style="display: none; margin-top: 0px;"></div>	
	
		<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />
		
	{!!Form::close()!!}	
	
</div>
