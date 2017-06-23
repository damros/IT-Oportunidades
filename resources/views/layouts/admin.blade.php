<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <title>Administrador ITOportunidades</title>
    {!!Html::style('css/admin/bootstrap.min.css')!!}
    {!!Html::style('css/admin/metisMenu.min.css')!!}
    {!!Html::style('css/admin/sb-admin-2.css')!!}
    {!!Html::style('css/admin/admin.css')!!}
    {!!Html::style('css/admin/font-awesome.min.css')!!}
</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">ITOportunidades Admin</a>
            </div>          
			
            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {!!Auth::user()->name!!}<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!!URL::to('/admin/adminLogout')!!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Categorías<span class="fa arrow"></span></a>                            
							<ul class="nav nav-second-level">
                                <li>
									<a href="#"><i class="fa fa-users fa-fw"></i> Grupos de Categorías<span class="fa arrow"></span></a>                            
									<ul class="nav nav-third-level">
										<li>
											<a href="{!!URL::to('/admin/category-groups/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
										</li>
										<li>
											<a href="{!!URL::to('/admin/category-groups')!!}"><i class='fa fa-list-ol fa-fw'></i> Grupos de Categorías</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="fa fa-users fa-fw"></i> Categorías<span class="fa arrow"></span></a>                            
									<ul class="nav nav-third-level">
										<li>
											<a href="{!!URL::to('/admin/categorys/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
										</li>
										<li>
											<a href="{!!URL::to('/admin/categorys')!!}"><i class='fa fa-list-ol fa-fw'></i> Categorías</a>
										</li>
									</ul>
								</li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Estados de Postulaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/admin/application-status/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/admin/application-status')!!}"><i class='fa fa-list-ol fa-fw'></i> Estados de Postulaciones</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> <?php echo trans('labels.Permissions');?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/admin/permissions/create')!!}"><i class='fa fa-plus fa-fw'></i> <?php echo trans('labels.Add');?></a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/admin/permissions')!!}"><i class='fa fa-list-ol fa-fw'></i> <?php echo trans('labels.Permissions');?></a>
                                </li>
                            </ul>
                        </li>
                        
						<li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> <?php echo trans('labels.Profiles');?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/admin/profiles/create')!!}"><i class='fa fa-plus fa-fw'></i> <?php echo trans('labels.Add');?></a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/admin/profiles')!!}"><i class='fa fa-list-ol fa-fw'></i> <?php echo trans('labels.Profiles');?></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Tipos de trabajo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/admin/job-types/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/admin/job-types')!!}"><i class='fa fa-list-ol fa-fw'></i> Tipos de trabajo</a>
                                </li>
                            </ul>
                        </li>
						@if (can("user-add"))
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								@if (can("user-add"))
                                <li>
                                    <a href="{!!URL::to('/admin/users/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
								@endif
                                <li>
                                    <a href="{!!URL::to('/admin/users')!!}"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                </li>
                            </ul>
                        </li>
						@endif
                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
			@include('admin.alerts.success')
			@include('admin.alerts.errors')
			@include('admin.alerts.request')
            @yield('content')
        </div>

    </div>
    

    {!!Html::script('scripts/admin/jquery.min.js')!!}
    {!!Html::script('scripts/admin/script.js')!!}
    {!!Html::script('scripts/admin/bootstrap.min.js')!!}
    {!!Html::script('scripts/admin/metisMenu.min.js')!!}
    {!!Html::script('scripts/admin/sb-admin-2.js')!!}

</body>

</html>
