<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
	<head>

		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8">

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- CSS
		================================================== -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">

		<style>

			/* Secondary Font */
			h1, h2, h3, h4, h5, h6,button { font-family: "Montserrat", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif; }

			/* #Typography
			================================================== */
			h1, h2, h3, h4, h5, h6 {
				color: #333;
				font-weight: 500;
			}

			h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { font-weight: inherit; }

			h1 { font-size: 30px; line-height: 54px; }
			h2 { font-size: 24px; line-height: 48px; }
			h3 { font-size: 22px; line-height: 44px; }
			h4 { font-size: 18px; line-height: 36px; }
			h5 { font-size: 16px; line-height: 28px; }
			h6 { font-size: 14px; line-height: 24px; }

			p { margin: 0 0 15px 0; }
			p img { margin: 0; }
			p.lead { font-size: 21px; line-height: 27px; color: #555;  }


			hr { border: solid #ddd; border-width: 1px 0 0; clear: both; margin: 10px 0 30px; height: 0; }

			a { color: #505050; text-decoration: none; outline: 0; -webkit-transition: color 0.2s ease-in-out; -moz-transition: color 0.2s ease-in-out; -o-transition: color 0.2s ease-in-out; -transition: color 0.2s ease-in-out; }
			a:hover { color: #666; }
			p a, p a:visited { line-height: inherit; }


			header {
				height: 90px;
				background-color: #fff;
			}

			#logo img { margin-top: 24px; }

			.titlebar {
				background-color: #f6f6f6;
				position: relative;
				padding: 40px;
				margin-bottom: 50px;
			}


			.titlebar.single { padding: 45px 0 47px 0; }


			.titlebar h2 {
				font-size: 27px;
				line-height: 36px;
			}

			/* ------------------------------------------------------------------- */
			/* Blog Styles
			---------------------------------------------------------------------- */
			.post-container  {
				margin-bottom: 50px;
			}

			.post-content {
				border-bottom: 1px solid #e0e0e0;
				padding: 33px 0 36px;
			}

			.post-content h3 {
				line-height: 38px;
				font-size: 24px;
			}


			.post-content a:hover h3 {
				color: #666;
			}

			.post-content span {
				position: relative;
				top: 3px;
			}

			.post-content p {
				margin-top: 19px;
			}

			.post-content a.button {
				margin-top: 15px;
			}


			/* ------------------------------------------------------------------- */
			/* Footer
			---------------------------------------------------------------------- */
			#footer {
				background-color: #202020;
				padding: 50px 0 0 0;
				color: #999;
			}
			#footer h4 {
				color: #fff;
				font-size: 20px;
				margin-bottom: 12px;
			}

			#footer a.button { margin-top: 12px; }
			#footer a.button:hover { background-color: #fff; color: #333; }

			.footer-bottom {
				border-top: 1px solid #333;
				margin-top: 35px;
				text-align: center;
				padding: 30px 0;
			}

			.copyrights { color: #777; }
			.copyrights a { color: #ddd; }


			button { background-color: #58ba2b; }



			a { color: #58ba2b; }


			/* #Base (1180 Grid)
			================================================== */

			.container                                  { position: relative; width: 1200px; margin: 0 auto; padding: 0; }
			.row                                        { margin-bottom: 20px; }

			/* Nested Column Classes */
			.column.alpha, .columns.alpha               { margin-left: 0; }
			.column.omega, .columns.omega               { margin-right: 0; }

			/* Base Grid */
			.container .one.column,
			.container .one.columns                     { width: 55px;  }
			.container .two.columns                     { width: 130px; }
			.container .three.columns                   { width: 205px; }
			.container .four.columns                    { width: 280px; }
			.container .five.columns                    { width: 355px; }
			.container .six.columns                     { width: 430px; }
			.container .seven.columns                   { width: 505px; }
			.container .eight.columns                   { width: 580px; }
			.container .nine.columns                    { width: 655px; }
			.container .ten.columns                     { width: 730px; }
			.container .eleven.columns                  { width: 805px; }
			.container .twelve.columns                  { width: 880px; }
			.container .thirteen.columns                { width: 955px; }
			.container .fourteen.columns                { width: 1030px; }
			.container .fifteen.columns                 { width: 1105px; }
			.container .sixteen.columns                 { width: 1180px; }

			.container .one-third.column                { width: 380px; }
			.container .two-thirds.column               { width: 780px; }


			/* #Dekstop (960 Grid)
			================================================== */

			/* Note: Design for a width of 960px */

			@media only screen and (min-width: 960px) and (max-width: 1289px) {
				.container                                  { position: relative; width: 960px; margin: 0 auto; padding: 0; }
				.row                                        { margin-bottom: 20px; }

				/* Nested Column Classes */
				.column.alpha, .columns.alpha               { margin-left: 0; }
				.column.omega, .columns.omega               { margin-right: 0; }

				/* Base Grid */
				.container .one.column,
				.container .one.columns                     { width: 40px;  }
				.container .two.columns                     { width: 100px; }
				.container .three.columns                   { width: 160px; }
				.container .four.columns                    { width: 220px; }
				.container .five.columns                    { width: 280px; }
				.container .six.columns                     { width: 340px; }
				.container .seven.columns                   { width: 400px; }
				.container .eight.columns                   { width: 460px; }
				.container .nine.columns                    { width: 520px; }
				.container .ten.columns                     { width: 580px; }
				.container .eleven.columns                  { width: 640px; }
				.container .twelve.columns                  { width: 700px; }
				.container .thirteen.columns                { width: 760px; }
				.container .fourteen.columns                { width: 820px; }
				.container .fifteen.columns                 { width: 880px; }
				.container .sixteen.columns                 { width: 940px; }

				.container .one-third.column                { width: 300px; }
				.container .two-thirds.column               { width: 620px; }

			}

			/* #Tablet (Portrait)
			================================================== */

			/* Note: Design for a width of 768px */

			@media only screen and (min-width: 768px) and (max-width: 990px) {
				.container                                  { width: 768px; }
				.container .column,
				.container .columns                         { margin-left: 10px; margin-right: 10px;  }
				.column.alpha, .columns.alpha               { margin-left: 0; margin-right: 10px; }
				.column.omega, .columns.omega               { margin-right: 0; margin-left: 10px; }
				.alpha.omega                                { margin-left: 0; margin-right: 0; }

				.container .one.column,
				.container .one.columns                     { width: 28px; }
				.container .two.columns                     { width: 76px; }
				.container .three.columns                   { width: 124px; }
				.container .four.columns                    { width: 172px; }
				.container .five.columns                    { width: 220px; }
				.container .six.columns                     { width: 268px; }
				.container .seven.columns                   { width: 316px; }
				.container .eight.columns                   { width: 364px; }
				.container .nine.columns                    { width: 412px; }
				.container .ten.columns                     { width: 460px; }
				.container .eleven.columns                  { width: 508px; }
				.container .twelve.columns                  { width: 556px; }
				.container .thirteen.columns                { width: 604px; }
				.container .fourteen.columns                { width: 652px; }
				.container .fifteen.columns                 { width: 700px; }
				.container .sixteen.columns                 { width: 748px; }

				.container .one-third.column                { width: 236px; }
				.container .two-thirds.column               { width: 492px; }
			}


			/*  #Mobile (Portrait)
			================================================== */

			/* Note: Design for a width of 320px */

			@media only screen and (max-width: 767px) {
				.container { width: 300px; }
				.container .columns,
				.container .column { margin: 0; }

				.container .one.column,
				.container .one.columns,
				.container .two.columns,
				.container .three.columns,
				.container .four.columns,
				.container .five.columns,
				.container .six.columns,
				.container .seven.columns,
				.container .eight.columns,
				.container .nine.columns,
				.container .ten.columns,
				.container .eleven.columns,
				.container .twelve.columns,
				.container .thirteen.columns,
				.container .fourteen.columns,
				.container .fifteen.columns,
				.container .sixteen.columns,
				.container .one-third.column,
				.container .two-thirds.column,
				.container .twelve.sidebar-right.columns,
				.container .twelve.sidebar-left.columns,
				.container .five.sidebar-right.columns,
				.container .eleven.sidebar-right.columns { width: 300px; }

			}


			/* #Mobile (Landscape)
			================================================== */

			/* Note: Design for a width of 480px */

			@media only screen and (min-width: 480px) and (max-width: 767px) {
				.container { width: 420px; }
				.container .columns,
				.container .column { margin: 0; }

				.container .one.column,
				.container .one.columns,
				.container .two.columns,
				.container .three.columns,
				.container .four.columns,
				.container .five.columns,
				.container .six.columns,
				.container .seven.columns,
				.container .eight.columns,
				.container .nine.columns,
				.container .ten.columns,
				.container .eleven.columns,
				.container .twelve.columns,
				.container .thirteen.columns,
				.container .fourteen.columns,
				.container .fifteen.columns,
				.container .sixteen.columns,
				.container .one-third.column,
				.container .two-thirds.column,
				.container .twelve.sidebar-right.columns,
				.container .twelve.sidebar-left.columns,
				.container .five.sidebar-right.columns,
				.container .eleven.sidebar-right.columns { width: 420px; }
			}

			.clearfix { zoom: 1; }

		</style>

	</head>

	<div style='line-height: 1;
		 background-color: #fff;
		 font-size: 16px;
		 line-height: 27px;
		 color: #666;
		 -webkit-font-smoothing: antialiased; 
		 -webkit-text-size-adjust: 100%;
		 overflow-x: hidden;
		 font-family: "Lato", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;'>
		<div id="wrapper" class="div" style="background-color: #fff;">


			<!-- Header
			================================================== -->
			<header>
				<div class="container" style="margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline;">
					<div class="sixteen columns">

						<!-- Logo -->
						<div id="logo" style="margin-left: 0; display: inline-block;">
							<h1 class="h1"><a href="{!!URL::to('/')!!}">{{ Html::image('images/logoit.png','IT Oportunidades')}}</a></h1>
						</div>

					</div>
				</div>
			</header>
			<div class="clearfix"></div>


			<!-- Titlebar
			================================================== -->
			<div id="titlebar" class="single titlebar" style="background-color: #f6f6f6; position: relative; padding: 40px; margin-bottom: 50px;">
				<div class="container">

					<div class="sixteen columns">
						<h2 class="h2">Bienvenido {{ $cdata["name"] }}!</h2>
					</div>

				</div>
			</div>


			<!-- Content
			================================================== -->


			<!-- Container -->
			<div class="container">

				<!-- Blog Posts -->
				<div class="sixteen columns">
					
					<!-- Post -->
					<div class="post-container">
						
						<div class="post-content">
							<h3>Gracias por su registro!</h3>
							Por favor ingrese al siguiente link para activar su cuenta: <a class="btn" href="{{ url('user/activation', $cdata["link"])}}">{{ url('user/activation', $cdata["link"])}}</a>
							<p>Si no puede ver el acceder al hacer click, copie la dirección en su navegador.</p>
						</div>
						
						<div class="post-content">
							<h3>Sus credenciales para iniciar sesión son:</h3>
							<p>Usuario: {{ $cdata["name"]}}</p>
							<p>E-Mail: {{ $cdata["email"]}}</p>
							<p>Password: {{ $cdata["password"]}}</p>
						</div>
						
					</div>
										
				</div>
			</div>

			<!-- Footer
			================================================== -->
			<div style="margin-top: 60px;"></div>

			<div id="footer">
				<!-- Bottom -->
				<div class="container">
					<div class="footer-bottom">
						<div class="sixteen columns">
							<div class="copyrights">©  Copyright 2017 by <a class="a" href="http://www.it-oportunidades.com">IT-Oportunidades</a>. Todos los derechos reservados.</div>
						</div>
					</div>
				</div>

			</div>
			<!-- Wrapper / End -->

		</div>
	</div>
</html>