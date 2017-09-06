@extends('layouts.admin')
@section('content')

<div>
<div class="row centered-form">
                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title">Editar Organización</h3>
                        </div>
                        <div class="panel-body">
                        {!!Form::model($organization,['route'=>['admin.organization.update',$organization],'method'=>'PUT'])!!}
                                @include('admin.organization.forms.organization')
                                {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
                        {!!Form::close()!!}

                        </div>
                </div>
    </div>
</div>		

@endsection

