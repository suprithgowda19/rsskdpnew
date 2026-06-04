<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('messages.Pojecttitle') }}</title>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @section('headerscript')

    <link rel="manifest" href="{{ url('public/_manifest.json') }}" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('public/app/icons/icon-192x192.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/fonts/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/styles/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('public/styles/style.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">

    <!--Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>

    <style>
        .lan-btn span 
        {
            position: absolute;
            right: 10px;
            top: 9px;
        }
        .language a
        {
            border-bottom: 0px solid !important;
        }
        .main-logo
        {
            font-size: 22px !important;
            line-height: 30px;
            color: #FFF;
            font-weight: 600 !important;
        }
    </style>

    @show
</head>

<body class="theme-light" data-highlight="orange">

    <div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

    <div id="page">
        @section('header')

        <div class="header header-fixed header-auto-show header-logo-app">
            <a href="{{route('dashboard')}}" class="header-title">{{ __('messages.Pojecttitle') }}</a>
            <!--<a href="#" data-menu="" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>-->
             <a class="header-icon header-icon-2 show-on-theme-light  changeLang" id="{{ __('messages.langid') }}" href="#" ><b><span>{{ __('messages.lang') }}</span></b></a>
            
        </div>

        <div id="footer-bar" class="footer-bar-5">
            <a href="{{ route('maintanence') }}">
                <i data-feather="settings" data-feather-line="1" data-feather-size="21" data-feather-color="brown-dark" data-feather-bg="brown-fade-light"></i>
                <span>{{ __('messages.menu2') }}</span>
            </a>
            <a href="{{ route('resources.list')}}">
                <i data-feather="heart" data-feather-line="1" data-feather-size="21" data-feather-color="green-dark" data-feather-bg="green-fade-light"></i>
                <span>{{ __('messages.menu3') }}</span>
            </a>
            <a href="{{ route('dashboard') }}" class="active-nav">
                <i data-feather="home" data-feather-line="1" data-feather-size="21" data-feather-color="blue-dark" data-feather-bg="blue-fade-light"></i>
                <span>{{ __('messages.menu1') }}</span>
            </a>
            <a href="{{ route('maintanence')}}">
                <i data-feather="globe" data-feather-line="1" data-feather-size="21" data-feather-color="dark-dark" data-feather-bg="gray-fade-light"></i>
                <span>{{ __('messages.menu4') }}</span>
            </a>
            @if(Route::currentRouteName()== 'ssv.home' || Route::currentRouteName()== 'ssv.register' || Route::currentRouteName()== 'ssv.checkstatus')
             <a href="{{ route('maintanence')}}">
                <i data-feather="file" data-feather-line="1" data-feather-size="21" data-feather-color="red-dark" data-feather-bg="red-fade-light"></i>
                <span>Report</span>
            </a>
            @else
            <a href="{{ route('maintanence')}}">
                <i data-feather="file" data-feather-line="1" data-feather-size="21" data-feather-color="red-dark" data-feather-bg="red-fade-light"></i>
                <span>{{ __('messages.menu5') }}</span>
            </a>
            @endif
            
        </div>

        

        <div class="page-content" style="padding-bottom:0px;">
            
            @show
            @yield('content')
            

            
            
            <div class="footer mb-80" data-menu-load="{{ route('footer')}}"></div>

        </div> 
@section('footer')
       

    </div>


 <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260" data-menu-load="{{ url('mainmenu') }}" data-menu-active="nav-welcome" data-menu-effect="menu-over"></div>
        <div id="menu-language" class="menu menu-box-modal rounded-m" data-menu-height="150" data-menu-width="310">
            <div class="me-3 ms-3 mt-3">
                <h1 class="font-700 mb-n1">Select language</h1>
                <p class="font-11 mb-1">Please choose a Language.</p>
                <div class="list-group language list-custom-small">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="changeLang" id="en">
                                <img class="me-3 mt-n1" width="20" src="{{ asset('images/flags/India.png')}}"><span>English</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="changeLang" id="ka">
                                <img class="me-3 mt-n1" width="20" src="{{ asset('images/flags/kannada.jpg')}}"><span>Kannada</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <input type="hidden" id="lngchk" value="{{ session()->get('langpop') == 'hide' ? 'hide' : '' }}">

        @show

    @section('footerscript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('public/scripts/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/scripts/custom.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function() {

//success and error messages

            $(".s-alrt").fadeTo(2000, 500).fadeOut(1000, function(){
                $(".s-alrt").fadeOut(1000);
            });

//language change

            var load = document.getElementById('lngchk').value;
            var url = "{{ route('changeLang') }}";

            if(load != "hide")
            {
                $('#langser').modal('show');
            }

            $(".changeLang").click(function()
            {
                window.location.href = url + "?lang="+ $(this).attr('id');
            });

        });

    </script>

    @show

</body>
</html>
@show