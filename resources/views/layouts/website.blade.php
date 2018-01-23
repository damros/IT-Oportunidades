<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>

        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        @yield('title')

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
        ================================================== -->
        {!!Html::style('css/style.css')!!}
        {!!Html::style('css/colors/green.css')!!}
        {!!Html::style('css/tooltipster.css')!!}
        {!!Html::style('css/pikaday.css')!!}
        {!!Html::style('css/itoportunidades.css')!!}

        @yield('head')
        
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
        <div id="wrapper">


            <!-- Header
            ================================================== -->
            <header class="sticky-header">
                <div class="container">
                    <div class="sixteen columns">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="{!!URL::to('/')!!}">
                                {{ Html::image('images/logoit.png','IT Oportunidades')}}
                            </a>				
                        </div>

                        <!-- Menu -->
                        <nav id="navigation" class="menu">
                            <ul id="responsive">

                                @if ( Auth::guest() )
                                <li><a href="#">{{trans('labels.Candidates')}}</a>
                                    <ul>
                                        <li><a href="{!!URL::to('jobs/browse')!!}">{{trans('labels.Browse_Jobs')}}</a></li>
                                        <li><a href="{!!URL::to('resume')!!}">{{trans('labels.Resume')}}</a></li>
                                    </ul>
                                </li>
                                @endif
                                @if ( ! Auth::guest() && currentUser()->profile->code == 'ca' )
                                <li><a href="#">{{trans('labels.Jobs')}}</a>
                                    <ul>
                                        <li><a href="{!!URL::to('jobs/browse')!!}">{{trans('labels.Browse_Jobs')}}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{!!URL::to('resume')!!}">{{trans('labels.Resume')}}</a>
                                </li>
                                @endif
                                @if ( Auth::guest() )
                                <li><a href="#">{{trans('labels.Companys')}}</a>
                                    <ul>
                                        <li><a href="{!!URL::to('jobs/add')!!}">{{trans('labels.Add_Job')}}</a></li>
                                    </ul>
                                </li>
                                @endif
                                @if ( ! Auth::guest() && currentUser()->profile->code == 'co' )
                                <li><a href="#">{{trans('labels.Jobs')}}</a>
                                    <ul>
                                        <li><a href="{!!URL::to('jobs/add')!!}">{{trans('labels.Add_Job')}}</a></li>
                                        @if (can("company-jobs-manage"))
                                        <li><a href="{!!URL::to('jobs/manage')!!}">{{trans('labels.Manage_Jobs')}}</a></li>
                                        @endif					
                                    </ul>
                                </li>
                                <li>
                                    <a href="{!!URL::to('company/profile')!!}">{{trans('labels.Company_Profile')}}</a>
                                </li>                                
                                @endif

                                <li><a href="{!!URL::to('contact')!!}">{{trans('labels.Contact')}}</a></li>

                            </ul>


                            <ul class="responsive float-right">
                                @if ( Auth::guest() )
                                <li><a href="{!!URL::to('my-account#register')!!}"><i class="fa fa-user"></i>{{trans('labels.Sign_Up')}}</a></li>
                                <li><a href="{!!URL::to('my-account')!!}"><i class="fa fa-lock"></i>{{trans('labels.Login')}} </a></li>
                                @else
                                <li><a href="#">{{currentUser()->name}}</a>
                                    <ul>						
                                        <li>
                                            <a href="{!!URL::to('password/change')!!}">{{trans('labels.Change_Password')}}</a>
                                        </li>													
                                    </ul>
                                </li>						
                                <li><a href="{{route('webLogout')}}">{{trans('labels.Logout')}}</a></li>
                                @endif				
                            </ul>

                        </nav>

                        <!-- Navigation -->
                        <div id="mobile-navigation">
                            <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
                        </div>

                    </div>
                </div>
            </header>
            <div class="clearfix"></div>

            @if ($message = Session::get('success'))
            <div class="notification closeable success">
                <p>{{ $message }}</p>
            </div>
            @endif

            @if ($message = Session::get('warning'))
            <div class="notification closeable warning">
                <p>{{ $message }}</p>
            </div>
            @endif			

            @if ($message = Session::get('error'))
            <div class="notification closeable error">
                <p>{{ $message }}</p>
            </div>
            @endif			

            @yield('content')

            <!-- Container / End -->


            <!-- Footer
            ================================================== -->
            <div class="margin-top-0"></div>

            <div id="footer">
                <!-- Main -->
                <div class="container">

                    <div class="seven columns">
                        <h4>{{trans('labels.About')}}</h4>
                        <p>
                            Nuestro portal ha sido desarrollado como una herramienta que permita a los candidatos postularse de manera simple y efectiva a las ofertas laborales que ofrezcan las empresas asociadas.<br />
                            Para las empresas inscritas el portal proveerá un control efectivo de los requerimientos publicados y de los candidatos postulados.<br />
                            Estas facilidades para candidatos y empresas estarán en ambiente web y en la Apps.
                        </p>
                    </div>

                    <div class="three columns">
                        <h4>{{trans('labels.Company')}}</h4>
                        <ul class="footer-links">
                            <li><a href="{!!URL::to('about-us')!!}">{{trans('labels.About_Us')}}</a></li>
                            <li><a href="{!!URL::to('terms')!!}">{{trans('labels.Terms_Of_Service')}}</a></li>
                        </ul>
                    </div>	

                    <div class="three columns">
                        <h4>{{trans('labels.Browse')}}</h4>
                        <ul class="footer-links">
                            <li><a href="{!!URL::to('jobs/browse')!!}">{{trans('labels.Find_Jobs')}}</a></li>

                        </ul>
                    </div>

                </div>

                <!-- Bottom -->
                <div class="container">
                    <div class="footer-bottom">
                        <div class="sixteen columns">
                            <div class="copyrights">©  Copyright 2017 <a href="#">IT Oportunidades</a>. Todos los derechos reservados.</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Back To Top Button -->
            <div id="backtotop"><a href="#"></a></div>

        </div>
        <!-- Wrapper / End -->

        <!-- Scripts
        ================================================== -->
        {!!Html::script('scripts/jquery-2.1.3.min.js')!!}
        {!!Html::script('scripts/custom.js')!!}
        {!!Html::script('scripts/jquery.superfish.js')!!}
        {!!Html::script('scripts/jquery.themepunch.tools.min.js')!!}
        {!!Html::script('scripts/jquery.themepunch.revolution.min.js')!!}
        {!!Html::script('scripts/jquery.themepunch.showbizpro.min.js')!!}
        {!!Html::script('scripts/jquery.flexslider-min.js')!!}
        {!!Html::script('scripts/chosen.jquery.min.js')!!}
        {!!Html::script('scripts/jquery.magnific-popup.min.js')!!}
        {!!Html::script('scripts/waypoints.min.js')!!}
        {!!Html::script('scripts/jquery.counterup.min.js')!!}
        {!!Html::script('scripts/jquery.jpanelmenu.js')!!}
        {!!Html::script('scripts/stacktable.js')!!}
        {!!Html::script('scripts/headroom.min.js')!!}        
        {!!Html::script('scripts/hoverIntent.js')!!}        
        {!!Html::script('scripts/jquery.blockUI.js')!!}
        {!!Html::script('scripts/jquery.gmaps.min.js')!!}
        {!!Html::script('scripts/jquery.tooltipster.min.js')!!}
        {!!Html::script('scripts/moment.min.js')!!}
        {!!Html::script('scripts/pikaday.js')!!}
        {!!Html::script('scripts/pikaday.jquery.js')!!}
        {!!Html::script('scripts/jquery.sceditor.js')!!}
        {!!Html::script('scripts/jquery.sceditor.xhtml.min.js')!!}

        {!!Html::script('scripts/itoportunidades.js')!!}
        
        @yield('scripts')

    </body>
</html>
