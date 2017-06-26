<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Administrador de IT Oportunidades | Iniciar Sesión</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		{!!Html::style('_admin/css/bootstrap.min.css')!!}
		<!-- Font Awesome -->
		{!!Html::style('_admin/plugins/font-awesome-4.7.0/css/font-awesome.min.css')!!}
		<!-- Ionicons -->
		{!!Html::style('_admin/plugins/ionicons/ionicons.min.css')!!}
		<!-- Theme style -->
		{!!Html::style('_admin/css/AdminLTE.min.css')!!}
		<!-- iCheck -->
		{!!Html::style('_admin/plugins/iCheck/square/blue.css')!!}

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition login-page">
		
		@yield('content')

		<!-- jQuery 2.2.3 -->
		{!!Html::script('_admin/plugins/jQuery/jquery-2.2.3.min.js')!!}
		<!-- Bootstrap 3.3.6 -->
		{!!Html::script('_admin/js/bootstrap.min.js')!!}
		<!-- iCheck -->
		{!!Html::script('_admin/plugins/iCheck/icheck.min.js')!!}
		<script>
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%' // optional
				});
			});
		</script>
	</body>
</html>