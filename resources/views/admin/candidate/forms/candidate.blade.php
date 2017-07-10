<div class="form-group">
	{!!Form::label('Nombre','Nombre:')!!}
	{!!Form::text('name',$candidate->name,['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::label('dni','DNI:')!!}
	{!!Form::text('dni',$candidate->identification,['class'=>'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('telefono','Teléfono:')!!}
	{!!Form::text('telefono',$candidate->phone,['class'=>'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('tituloProfesional','Titulo Profesional:')!!}
	{!!Form::text('tituloProfesional',$candidate->profesional_title,['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::label('categoriasPreferidas','Categorias Preferidas:')!!}
        <?php $categoriesPrefer = '' ; ?>
        
        @foreach ($candidate->categorys as $category)
            <?php 
            if ($category->preferred) {
            $categoriesPrefer = $categoriesPrefer.$category->category->name.'; ' ;}
            ?>  
        @endforeach
        
        {!!Form::text('categoriasPreferidas', $categoriesPrefer ,['class'=>'form-control'])!!}					
	
</div>

<div class="form-group">
	{!!Form::label('categoriasAdicionales','Categorias Adicionales:')!!}
        <?php $categoriesAditional = '' ; ?>
        
        @foreach ($candidate->categorys as $category)
            <?php 
             if (!$category->preferred) {
             $categoriesAditional = $categoriesAditional.$category->category->name.'; ' ;}
             ?>
        @endforeach
        
        {!!Form::text('categoriasPreferidas', $categoriesAditional ,['class'=>'form-control'])!!}					
	
</div>
<div class="form-group">
	{!!Form::label('direccion','Domicilio:')!!}
	{!!Form::text('direccion',$candidate->address,['class'=>'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('foto','Foto:')!!}
        <img src="/images/candidatephoto/{{$candidate->photo}}" alt="" style="width: 200px; height: 200px;"/>
	
</div>
<div class="form-group">
	{!!Form::label('videoPersonal','Video:')!!}
	{!!Form::text('videoPersonal',$candidate->video,['class'=>'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('detalleCurriculum','Detalle Curriculum:')!!}
	{!!Form::text('detalleCurriculum',$candidate->resume_content,['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::label('archivoCurriculum','Archivo de Curriculum:')!!}
        
                <a href="/documents/resumes/{{$candidate->resume_file}}" target="{{$candidate->id}}"  >
                        <img src="/images/download.png" style="width: 75px; height: 75px;"/>
                </a>
      
</div>

<div class="form-group">
	{!!Form::label('urls','URL(s):')!!}
        <table class="table">
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
        </table>
</div>
<div class="form-group">
	{!!Form::label('educacion','Educacion:')!!}
        <table class="table">
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

<div class="form-group">
	{!!Form::label('experienciaLaboral','Experiencia Laboral:')!!}
        <table class="table">
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


