<!-- Widgets -->
<form action="{{URL::current()}}" method="get" class="filter-jobs">	

	<!-- Sort by -->
	<div class="widget list-search">
		<h4>{{trans('labels.Browse_Jobs_Search_String')}}</h4>

		<button class="button"><i class="fa fa-search"></i></button>
		<input type="text" name="q" placeholder="{{trans('labels.Browse_Jobs_Search_Placeholder')}}" value="{{ app('request')->input('q') }}"/>
		<div class="clearfix"></div>

	</div>

	<div class="widget">
		<h4>{{trans('labels.Sort_by')}}</h4>

		<!-- Select -->
		<select data-placeholder="Choose Option" class="chosen-select-no-single" name="sort">
			<option <?php echo ( app('request')->input('sort') == "new" ? " selected='selected'" : "") ?> value="new">{{trans('labels.Newest')}}</option>
			<option <?php echo ( app('request')->input('sort') == "old" ? " selected='selected'" : "") ?> value="old">{{trans('labels.Oldest')}}</option>
			<option <?php echo ( app('request')->input('sort') == "exp_asc" ? " selected='selected'" : "") ?> value="exp_asc">{{trans('labels.Expiring_Date_Asc')}}</option>
			<option <?php echo ( app('request')->input('sort') == "exp_dsc" ? " selected='selected'" : "") ?> value="exp_dsc">{{trans('labels.Expiring_Date_Desc')}}</option>
		</select>

	</div>

	<!-- Location -->
	<div class="widget">
		<h4>{{trans('labels.Location')}}</h4>
		<input type="text" name="loc" placeholder="{{trans('labels.Location_Search_Placeholder')}}" value="{{ app('request')->input('loc') }}"/>
	</div>

	<!-- Job Type -->
	<div class="widget">
		<h4>{{trans('labels.Job_Type')}}</h4>

		<ul class="checkboxes">
			<li>
				<input id="check-0" type="checkbox" name="jobtype[]" value="-0" <?php echo ((in_array('-0', $seljobtypes[0]) ? " checked='checked'" : "")) ?>>
				<label for="check-0">{{trans('labels.Any_Type')}}</label>
			</li>
			@foreach ($jobtypes as $jobtype)
			<li>
				<input id="check-{{$jobtype->id}}" type="checkbox" name="jobtype[]" value="{{$jobtype->id}}" <?php echo ((in_array($jobtype->id, $seljobtypes[0]) ? " checked='checked'" : "")) ?>>
				<label for="check-{{$jobtype->id}}">{{$jobtype->name}}</label>
			</li>
			@endforeach
		</ul>

	</div>

	<button class="button">{{trans('labels.Search')}}</button>	

</form>
<!-- Widgets / End -->