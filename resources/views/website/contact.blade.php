@extends('layouts.website')
@section('title')
<script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBegaytSShSATo1UIW-FXHAvfwtwQ1pIfU"></script>
<title>Contacto - IT Oportunidades</title>
@endsection

@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="single">
    <div class="container">

        <div class="sixteen columns">
            <h2>{{trans('labels.Contact')}}</h2>
            <nav id="breadcrumbs">
                <ul>
                    <li>{{trans('labels.You_Are_Here')}}:</li>
                    <li><a href="/">{{trans('labels.Home')}}</a></li>
                    <li>{{trans('labels.Contact')}}</li>
                </ul>
            </nav>
        </div>

    </div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">
    <div class="sixteen columns">

        <h3 class="margin-bottom-20">{{trans('labels.Our_Office')}}</h3>

        <!-- Google Maps -->
        <section class="google-map-container">
            <div id="googlemaps" class="google-map google-map-full"></div>
        </section>
        <!-- Google Maps / End -->

    </div>
</div>
<!-- Container / End -->


<!-- Container -->
<div class="container">

    <div class="eleven columns">

        <h3 class="margin-bottom-15">{{trans('labels.Contact_Form')}}</h3>

        <!-- Contact Form -->
        <section id="contact" class="padding-right">

            <!-- Form -->
            {!!Form::open(['route'=>'message.store', 'method'=>'POST', 'name'=>'contact', 'id'=>'contact', 'class'=>'ajax-submit tooltips'])!!}
            <div class="form-container">
                <fieldset>

                    <div>
                        <label>{{trans('labels.Name')}}: <span>*</span></label>
                        <input name="name" type="text" id="name" value="{{ (currentUser() ? currentUser()->name : "") }}"/>
                    </div>

                    <div>
                        <label>{{trans('labels.Email_Address')}}: <span>*</span></label>
                        <input name="email" type="email" id="email" value="{{ (currentUser() ? currentUser()->email : "") }}" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
                    </div>

                    <div>
                        <label>{{trans('labels.Message')}}: <span>*</span></label>
                        <textarea name="message" cols="40" rows="3" id="comment" spellcheck="true"></textarea>
                    </div>

                </fieldset>

                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />

                <div id="result"></div>

                <input type="submit" class="submit" id="submit" value="{{trans('labels.Send_Message')}}" />
            </div>

            <div class="clearfix"></div>

            <div class="margin-bottom-20"></div>

            <!-- Message -->
            <div class="notification closeable success form-messages" style="display: none;"></div>							

            {!!Form::close()!!}

        </section>
        <!-- Contact Form / End -->

    </div>
    <!-- Container / End -->


    <!-- Sidebar
    ================================================== -->
    <div class="five columns">

        <!-- Information -->
        <h3 class="margin-bottom-10">{{trans('labels.Information')}}</h3>
        <div class="widget-box">

            <ul class="contact-informations" style="margin-top: 0px;">
                <li>{{$organization->address}} </li>
                <li>{{$organization->location}} </li>
            </ul>

            <ul class="contact-informations second">
                <li><i class="fa fa-phone"></i> <p>{{$organization->phone}}</p></li>
                <li><i class="fa fa-envelope"></i> <p>{{$organization->email}}</p></li>
            </ul>

        </div>

    </div>
</div>
<!-- Container / End -->


@endsection

@section('scripts')
<!-- Google Maps -->
{!!Html::script('js/jquery.gmaps.min.js')!!}

<script type="text/javascript">
(function ($) {
    $(document).ready(function () {

        $('#googlemaps').gMap({
            maptype: 'ROADMAP',
            scrollwheel: false,
            zoom: 13,
            markers: [
                {
                    address: '{{$organization->address}}, {{$organization->location}}', // Your Adress Here
                    html: '<strong>Nuestra Oficina</strong><br>{{$organization->address}} </br>{{$organization->location}} ',
                    popup: true
                }
            ]
        });

    });

})(this.jQuery);
</script>

@endsection