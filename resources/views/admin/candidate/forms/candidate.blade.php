<div class='box'><div class='box-body'>
<div class="col-xs-6">
	{!!Form::label('Nombre','Nombre:')!!}
	{!!Form::text('name',$candidate->name,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>
<div class="col-xs-6">
	{!!Form::label('dni','DNI:')!!}
	{!!Form::text('dni',$candidate->identification,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('telefono','Teléfono:')!!}
	{!!Form::text('telefono',$candidate->phone,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-6">
	{!!Form::label('tituloProfesional','Titulo Profesional:')!!}
	{!!Form::text('tituloProfesional',$candidate->profesional_title,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>
<div class="col-xs-6">
	{!!Form::label('categoriasPreferidas','Categorias Preferidas:')!!}
	<?php $categoriesPrefer = ''; ?>

	@foreach ($candidate->categorys as $category)
	<?php
	if ($category->preferred) {
		$categoriesPrefer = $categoriesPrefer . $category->category->full_name . '; ';
	}
	?>  
	@endforeach

	{!!Form::text('categoriasPreferidas', $categoriesPrefer ,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}					

</div>

<div class="col-xs-6">
	{!!Form::label('categoriasAdicionales','Categorias Adicionales:')!!}
<?php $categoriesAditional = ''; ?>

	@foreach ($candidate->categorys as $category)
	<?php
	if (!$category->preferred) {
		$categoriesAditional = $categoriesAditional . $category->category->full_name . '; ';
	}
	?>
	@endforeach

	{!!Form::text('categoriasPreferidas', $categoriesAditional ,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}					

</div>
<div class="col-xs-6">
	{!!Form::label('direccion','Domicilio:')!!}
	{!!Form::text('direccion',$candidate->address,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>
<div class="col-xs-6">
	{!!Form::label('videoPersonal','Video:')!!}
	{!!Form::text('videoPersonal',$candidate->video,['class'=>'form-control','readonly' => 'true', 'style'=>'cursor:default; background-color:white'])!!}
</div>

<div class="col-xs-12">
	{!!Form::label('detalleCurriculum','Detalle Curriculum:')!!}
        <div style="border: 1px solid #ccc; padding: 6px 12px; background-color: white">{!!$candidate->resume_content!!}</div>
</div>

</div></div>
        
<div class="col-xs-12 box" >
        <div class='box-header'>
            <h3 class="box-title">{!!Form::label('urls','URL(s):')!!}</h3>
        </div>   
        <div class='box-body no-padding'>
	<table class="table table-striped">
		<thead>
		<th>Nombre</th>
		<th>URL</th>
		</thead>
		<tbody>
			@foreach($candidate->urls as $candidates_url)
			<tr>
				<td>{{$candidates_url->name}}</td>
				<td>{{$candidates_url->url}}</td>
			</tr> 
			@endforeach
		</tbody>
	</table></div>
</div>
<div class="col-xs-12 box">
    <div class='box-header'>
        <h3 class="box-title">{!!Form::label('educacion','Educacion:')!!}</h3>
    </div>
    <div class='box-body no-padding'>
	<table class="table table-striped">
		<thead>
		<th>Institución</th>
		<th>Título obtenido o Contenido del curso</th>
		<th>Perido de cursada</th>
		<th>Promedio de cursada</th>
		</thead>
		<tbody>
			@foreach($candidate->educations as $candidates_education)
			<tr>
				<td>{{$candidates_education->school_name}}</td>
				<td>{{$candidates_education->qualifications}}</td>
				<td>{{$candidates_education->edates}}</td>
				<td>{{$candidates_education->notes}}</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
    </div>
</div>

<div class="col-xs-12 box">
    <div class='box-header'>
        <h3 class="box-title">{!!Form::label('experienciaLaboral','Experiencia Laboral:')!!}</h3>
    </div>
    
    <div class='box-body no-padding'>
	<table class="table table-striped">
		<thead>
		<th>Empleador</th>
		<th>Puesto</th>
		<th>Perido ocupado</th>
		<th>Comentarios</th>
		</thead>
		<tbody>
			@foreach($candidate->experiences as $candidates_experience)
			<tr>
				<td>{{$candidates_experience->employeer}}</td>
				<td>{{$candidates_experience->job_title}}</td>
				<td>{{$candidates_experience->edates}}</td>
				<td>{{$candidates_experience->notes}}</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
    </div>
</div>


