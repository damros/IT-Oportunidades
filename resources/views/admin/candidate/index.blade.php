@extends('layouts.admin')
    @section('content')
    
        <div class="candidates">
		<table class="table dttable">
			<thead>
				<th>Nombre</th>
				<th>DNI</th>
                                <th>Título</th>
                                <th>Archivo de Curriculum</th>
				<th>Más</th>
			</thead>
			<tbody>
				@foreach($candidates as $candidate)
					<tr>
						<td>{{$candidate->name}}</td>
						<td>{{$candidate->identification}}</td>
                                                <td>{{$candidate->profesional_title}}</td>
                                                <td  style="text-align: center">
                                                    <?php if ($candidate->resume_file) {?>
                                                    <a href="/documents/resumes/{{$candidate->resume_file}}" target="{{$candidate->id}}"  >
                                                            <img src="/images/download.png" style="width: 30px; height: 30;"/>
                                                    </a>
                                                    <?php }?>
                                                </td>
						<td>
							{!!link_to_route('admin.candidates.edit', $title = 'Ver', $parameters = $candidate, $attributes = ['class'=>'btn btn-primary'])!!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{$candidates->render()}}
	</div>
    
    @endsection