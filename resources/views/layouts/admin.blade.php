<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Administrador ITOportunidades</title>
		{!!Html::style('_admin/css/bootstrap.min.css')!!}
		{!!Html::style('_admin/css/admin.css')!!}
		<!-- Font Awesome -->
		{!!Html::style('_admin/plugins/font-awesome-4.7.0/css/font-awesome.min.css')!!}
		<!-- Ionicons -->
		{!!Html::style('_admin/plugins/ionicons/ionicons.min.css')!!}
		<!-- Theme style -->
		{!!Html::style('_admin/css/AdminLTE.min.css')!!}
		<!-- AdminLTE Skins. Choose a skin from the css/skins
			 folder instead of downloading all of them to reduce the load. -->
		{!!Html::style('_admin/css/skins/_all-skins.min.css')!!}
		<!-- iCheck -->
		{!!Html::style('_admin/plugins/iCheck/flat/blue.css')!!}
		<!-- jvectormap -->
		{!!Html::style('_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')!!}
		<!-- Date Picker -->
		{!!Html::style('_admin/plugins/datepicker/datepicker3.css')!!}
		<!-- Daterange picker -->
		{!!Html::style('_admin/plugins/daterangepicker/daterangepicker.css')!!}
		<!-- bootstrap wysihtml5 - text editor -->
		{!!Html::style('_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')!!}
		<!-- DataTables -->

		{!!Html::style('_admin/plugins/datatables/jquery.dataTables.min.css')!!}
		{!!Html::style('_admin/plugins/datatables/extensions/Buttons/css/buttons.dataTables.min.css')!!}  
		<!--
		{!!Html::style('plugins/datatables/dataTables.bootstrap.css')!!}
		{!!Html::style('plugins/datatables/extensions/buttons/css/buttons.bootstrap.min.css')!!} 
		-->
		<!-- Tooltipster -->
		{!!Html::style('_admin/plugins/tooltipster/css/tooltipster.css')!!}
		{!!Html::style('_admin/plugins/tooltipster/css/themes/tooltipster-light.css')!!}
		{!!Html::style('_admin/plugins/tooltipster/css/themes/tooltipster-punk.css')!!}
	</head>

	<body class="hold-transition skin-blue sidebar-mini">

		<div class="wrapper">

			<header class="main-header">
				<!-- Logo -->
				<a href="{!!URL::to('/admin')!!}" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>It</b>O</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>IT </b>Oportunidades</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>

					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									{{Html::image('/_admin/img/logo-4latam.png','Imagen de Usuario',array('class' => 'user-image'))}}
									<span class="hidden-xs">{!!Auth::user()->name!!}</span>
								</a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										{{Html::image('/_admin/img/logo-4latam.png','Imagen de Usuario',array('class' => 'img-circle'))}}

										<p>
											{!!Auth::user()->name!!}
											<small>{!!" (" . Auth::user()->user . ")"!!}</small>
										</p>																				
									</li>
									<!-- Menu Body -->
									<li class="user-body">
										<div class="row">
											<div class="col-xs-12 text-center">
												Rol: {!!Auth::user()->profile->name!!}
											</div>
										</div>
										<!-- /.row -->
									</li>									
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-right">
											<a href="{!!URL::to('/admin/adminLogout')!!}" class="btn btn-default btn-flat">Cerrar Sesión</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel -->
					<div class="user-panel">
						<div class="pull-left image">
							{{Html::image('/_admin/img/logo-4latam.png','Imagen de Usuario',array('class' => 'img-circle'))}}
						</div>
						<div class="pull-left info">
							<p>{!!Auth::user()->name!!}</p>
							<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>
					</div>
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">MENÚ PRINCIPAL</li>
						<li>
							<a href="{!!URL::to('/admin')!!}">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-share"></i> <span> Candidatos</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">						
								<li>
									<a href="{!!URL::to('/admin/candidates')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
								</li>							
							</ul>
						</li>						
						<li class="treeview">
							<a href="#">
								<i class="fa fa-share"></i> <span>Categorías</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="#"><i class="fa fa-circle-o"></i> Grupos de Categorias
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li>
											<a href="{!!URL::to('/admin/category-groups/create')!!}"><i class='fa fa-plus fa-fw'></i> {{trans('labels.Menu_Add')}}</a>
										</li>
										<li>
											<a href="{!!URL::to('/admin/category-groups')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="treeview-menu">
								<li>
									<a href="#"><i class="fa fa-circle-o"></i> Categorias
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li>
											<a href="{!!URL::to('/admin/categorys/create')!!}"><i class='fa fa-plus fa-fw'></i> {{trans('labels.Menu_Add')}}</a>
										</li>
										<li>
											<a href="{!!URL::to('/admin/categorys')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-share"></i> <span> Empresas</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">						
								<li>
									<a href="{!!URL::to('/admin/companies')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
								</li>							
							</ul>
						</li>						
						<li class="treeview">
							<a href="#">
								<i class="fa fa-share"></i> <span>Estados de Postulaciones</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{!!URL::to('/admin/application-status/create')!!}"><i class='fa fa-plus fa-fw'></i> {{trans('labels.Menu_Add')}}</a>
								</li>							
								<li>
									<a href="{!!URL::to('/admin/application-status')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
								</li>							
							</ul>
						</li>	
						<li class="treeview">
							<a href="#">
								<i class="fa fa-share"></i> <span>{{trans('labels.Profiles')}}</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{!!URL::to('/admin/profiles/create')!!}"><i class='fa fa-plus fa-fw'></i> {{trans('labels.Menu_Add')}}</a>
								</li>							
								<li>
									<a href="{!!URL::to('/admin/profiles')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
								</li>							
							</ul>
						</li>						
						<li class="treeview">
							<a href="#">
								<i class="fa fa-share"></i> <span>{{trans('labels.Permissions')}}</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{!!URL::to('/admin/permissions/create')!!}"><i class='fa fa-plus fa-fw'></i> {{trans('labels.Menu_Add')}}</a>
								</li>							
								<li>
									<a href="{!!URL::to('/admin/permissions')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
								</li>							
							</ul>
						</li>		
						<li class="treeview">
							<a href="#">
								<i class="fa fa-share"></i> <span> Tipos de trabajo</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{!!URL::to('/admin/job-types/create')!!}"><i class='fa fa-plus fa-fw'></i> {{trans('labels.Menu_Add')}}</a>
								</li>							
								<li>
									<a href="{!!URL::to('/admin/job-types')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
								</li>							
							</ul>
						</li>	
						<li class="treeview">
							<a href="#">
								<i class="fa fa-share"></i> <span> Usuarios</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{!!URL::to('/admin/users/create')!!}"><i class='fa fa-plus fa-fw'></i> {{trans('labels.Menu_Add')}}</a>
								</li>							
								<li>
									<a href="{!!URL::to('/admin/users')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
								</li>							
							</ul>
						</li>	
                                                <li class="treeview">
							<a href="#">
								<i class="fa fa-share"></i> <span> Organización</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
														
								<li>
									<a href="{!!URL::to('/admin/organization')!!}"><i class='fa fa-list-ol fa-fw'></i> {{trans('labels.Menu_List')}}</a>
								</li>							
							</ul>
						</li>	
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Main content -->
				<section class="content">
					@include('admin.alerts.success')
					@include('admin.alerts.errors')
					@include('admin.alerts.request')
					@yield('content')
					<!-- /.row (main row) -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.3 <b>Fecha</b> 16/07/2017
				</div>
				<strong>Administrador IT Oportunidades</strong> 
			</footer>
		</div>

		<!-- jQuery 2.2.3 -->
		{!!Html::script('_admin/plugins/jQuery/jquery-2.2.3.min.js')!!}
		<!-- jQuery UI 1.11.4 -->
		{!!Html::script('_admin/plugins/jQueryUI/jquery-ui.min.js')!!}
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		{!!Html::script('_admin/js/bootstrap.min.js')!!}
		<!-- Sparkline -->
		{!!Html::script('_admin/plugins/sparkline/jquery.sparkline.min.js')!!}
		<!-- jvectormap -->
		{!!Html::script('_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')!!}
		{!!Html::script('_admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')!!}
		<!-- jQuery Knob Chart -->
		{!!Html::script('_admin/plugins/knob/jquery.knob.js')!!}
		<!-- daterangepicker -->
		{!!Html::script('_admin/plugins/moment/moment.min.js')!!}
		{!!Html::script('_admin/plugins/daterangepicker/daterangepicker.js')!!}
		<!-- datepicker -->
		{!!Html::script('_admin/plugins/datepicker/bootstrap-datepicker.js')!!}
		{!!Html::script('_admin/plugins/datepicker/locales/bootstrap-datepicker.es.min.js')!!}
		<!-- Bootstrap WYSIHTML5 -->
		{!!Html::script('_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')!!}
		<!-- Slimscroll -->
		{!!Html::script('_admin/plugins/slimScroll/jquery.slimscroll.min.js')!!}
		<!-- FastClick -->
		{!!Html::script('_admin/plugins/fastclick/fastclick.js')!!}
		<!-- DataTables -->
		{!!Html::script('_admin/plugins/datatables/jquery.dataTables.min.js')!!}
		{!!Html::script('_admin/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js')!!}
		{!!Html::script('_admin/plugins/datatables/dataTables.bootstrap.min.js')!!}
		{!!Html::script('_admin/plugins/datatables/extensions/Buttons/js/buttons.bootstrap.min.js')!!}
		{!!Html::script('_admin/plugins/datatables/extensions/fnAddTr/fnAddTr.js')!!}
		{!!Html::script('_admin/plugins/datatables/extensions/Buttons/js/buttons.print.min.js')!!}
		{!!Html::script('_admin/plugins/datatables/extensions/Buttons/js/buttons.flash.min.js')!!}
		{!!Html::script('_admin/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js')!!}

		<!-- AdminLTE App -->
		{!!Html::script('_admin/js/app.min.js')!!}
		<!-- AdminLTE for demo purposes -->
		{!!Html::script('_admin/js/demo.js')!!}
		<!-- Tooltipster -->
		{!!Html::script('_admin/plugins/tooltipster/js/jquery.tooltipster.min.js')!!}
		<!-- BlockUI -->
		{!!Html::script('_admin/plugins/blockUI/jquery.blockUI.js')!!}
		{!!Html::script('_admin/plugins/printArea/jquery.PrintArea.js')!!}


		{!!Html::script('_admin/js/script.js')!!}	

	</body>
</html>
