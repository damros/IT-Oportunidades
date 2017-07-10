@extends('layouts.admin')
	@section('content')
	<div>
        <div class="row centered-form">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Curriculum Candidato</h3>
				</div>
				<div class="panel-body">
                                    @include('admin.candidate.forms.candidate')
				
				</div>
			</div>
		</div>
	</div>
	@endsection
