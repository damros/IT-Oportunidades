@extends('layouts.admin')
@section('content')
<div>
	<div class="row centered-form">
		<div class="panel">
			<div class="panel-heading">

				<h3 class="panel-title">
					<div>
						Curriculum del Candidato
						@if ($candidate->resume_file)
							<a style='float: right' href="/documents/resumes/{{$candidate->resume_file}}" target="{{$candidate->id}}"  >
								Descargar CV <img src="/images/download.png" style="width: 25px; height: 25;"/>
							</a>
						@endif
					</div>
				</h3>


			</div>
			<div class='col-xs-6' style='text-align:center; margin-top: 20px; z-index: 1'>
				<img src="{{$candidate->photo_candidate}}" alt="" style="width: 200px; height: 200px;"/>
			</div>
			<div class="panel-body" style="padding-top: 0px;">
				@include('admin.candidate.forms.candidate')
			</div>
		</div>
	</div>
</div>
@endsection
