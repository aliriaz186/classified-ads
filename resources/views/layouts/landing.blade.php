<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
{{--    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">--}}
{{--    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>--}}
{{--    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('bootstrap.min.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('jquery/3.5.1/jquery.min.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('bootstrap.min.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('popper/popper.min.js')}}"></script>--}}

    <link href="{{asset('theme')}}/css/style.css" type="text/css" rel="stylesheet" />


</head>
<body>
{{--    <a href="{{url('')}}"> <h2 style="position:fixed;color: white">{{env('APP_NAME')}}</h2></a>--}}
{{--    @if(\Illuminate\Support\Facades\Session::has('userId'))--}}
{{--        <a class="href-color" href="{{url('home')}}" style="float: right;">Dashboard</a>--}}
{{--    @else--}}
{{--        <a class="href-color" href="{{url('user-signup')}}" style="float: right;margin-left: 30px">Register</a>--}}
{{--        <a class="href-color" href="{{url('user-login')}}" style="float: right;margin-left: 30px">Login</a>--}}
{{--    @endif--}}
<header class="header-static navbar-sticky navbar-light shadow">
    <!-- Search -->
    <div class="top-search collapse bg-light gradbtnbox" id="search-open" data-parent="#search">
        <div class="container">
            <div class="row position-relative">
                <div class="col-md-8 mx-auto py-5">
                    <form>
                        <div class="input-group">
                            <input class="form-control border-radius-right-0 border-right-0" type="text" name="search" autofocus placeholder="What are you looking for?">
                            <button type="button" class="btn btn-grad gradbtn border-radius-left-0 mb-0">Search</button>
                        </div>
                    </form>
                </div>
                <a class=" top-0 right-0 mt-3 mr-3" data-toggle="collapse" href="#search-open"><i class="fas fa-window-close"></i></a> </div>
        </div>
    </div>
    <!-- End Search -->

    <!-- Navbar top start-->
    <div class="navbar-top d-none d-lg-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- navbar top Left-->
                <div class="d-flex align-items-center">
                    <!-- Language -->
                    <!-- Top info -->
                    <ul class="nav list-unstyled ml-3">
                        <li class="nav-item mr-3"> <a class="navbar-link" href="#"><strong>Phone:</strong> (024) 123-1457</a> </li>
                        <li class="nav-item mr-3"> <a class="navbar-link" href="#"><strong>Email:</strong> help@yaaritoronto.com</a> </li>
                    </ul>
                </div>

                <!-- navbar top Right-->
                <div class="d-flex align-items-center">
                    <!-- Top Account -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar top End-->

    <!-- Logo Nav Start -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{url('')}}">{{env('APP_NAME')}} </a>
            <!-- Menu opener button -->
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"> </span> </button>
            <!-- Main Menu Start -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <!-- Menu item 1 Demos-->
                    <li class="nav-item {{\Request::is('/') ? 'active' : ''}}" > <a class="nav-link " href="{{url('')}}" id="demosMenu"  aria-haspopup="true" aria-expanded="false">Home</a></li>
                    <li class="nav-item {{\Request::is('classified') ? 'active' : ''}}"> <a class="nav-link " href="{{url('classified')}}" id="demosMenu"  aria-haspopup="true" aria-expanded="false">Classified</a></li>
                    <li class="nav-item {{\Request::is('events') ? 'active' : ''}}"> <a class="nav-link " href="{{url('events')}}" id="demosMenu"  aria-haspopup="true" aria-expanded="false">Events</a></li>

                    <!-- Menu item 5 Elements-->

                </ul>
            </div>
            <!-- Main Menu End -->
            <!-- Header Extras Start-->
            <div class="navbar-nav">
                @if(\Illuminate\Support\Facades\Session::has('userId'))
                    <div class="nav-item border-0 d-none d-lg-inline-block align-self-center" style="margin-left: 50px"> <a href="{{url('home')}}" class=" btn btn-sm btn-grad text-white mb-0">MY ACCOUNT</a> </div>

                @else
                    <div class="nav-item border-0 d-none d-lg-inline-block align-self-center" style="margin-left: 50px"> <a href="{{url('user-login')}}" class=" btn btn-sm btn-grad text-white mb-0">LOGIN</a> </div>
                    <div class="nav-item border-0 d-none d-lg-inline-block align-self-center" style="margin-left: 10px"> <a href="{{url('user-signup')}}" class=" btn btn-sm btn-grad text-white mb-0">REGISTER</a> </div>

                @endif
            </div>
            <!-- Header Extras End-->
        </div>
    </nav>
    <!-- Logo Nav End -->
</header>


                @yield('content')
{{--<div style="background: #3c4a57">--}}
{{--    <div style="padding: 30px;margin: 0 auto;max-width: 250px">--}}
{{--        <a href="#" class="fa fa-facebook"></a>--}}
{{--        <a href="#" class="fa fa-twitter"></a>--}}
{{--        <a href="#" class="fa fa-snapchat-ghost"></a>--}}
{{--        <a href="#" class="fa fa-instagram"></a>--}}
{{--    </div>--}}
{{--</div>--}}

<footer class="main-footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class=" col-xl-3 col-xl-3 col-md-3 col-sm-6 col-xs-12 col-6 ">
                    <div class="footer-col">
                        <h4 class="footer-title">About us</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.


                        </p>
                    </div>
                </div>
                <div class=" col-xl-3 col-xl-3 col-md-3 col-sm-6 col-xs-12 col-6  ">
                    <div class="footer-col">
                        <h4 class="footer-title">Account</h4>
                        <ul class="list-unstyled footer-nav">
                            <li><a href="{{url('user-login')}}">Login </a></li>
                            <li><a href="{{url('user-signup')}}">Register </a></li>
                            <li><a href="{{url('home')}}"> My Account </a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-xl-3 col-md-3 col-sm-6 col-xs-12 col-12">
                    <div class="footer-col row">
                        <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                            <div class="mobile-app-content">
{{--                                <h4 class="footer-title">Mobile Apps</h4>--}}
{{--                                <div class="row ">--}}
{{--                                    <div class="col-6  "> <a class="app-icon" target="_blank" href="https://itunes.apple.com/"> <img src="images/app_store_badge.svg" alt="Available on the App Store"> </a> </div>--}}
{{--                                    <div class="col-6  "> <a class="app-icon" target="_blank" href="https://play.google.com/store/"> <img src="images/google-play-badge.svg" alt="Available on the App Store"> </a> </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                            <div class="hero-subscribe">
                                <h4 class="footer-title no-margin">Follow us on</h4>
                                <ul class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">
                                    <li><a class="icon-color fb" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Facebook"><i class="fab fa-facebook-f"></i> </a></li>
                                    <li><a class="icon-color tw" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Twitter"><i class="fab fa-twitter"></i> </a></li>
                                    <li><a class="icon-color gp" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Google+"><i class="fab fa-google-plus-g"></i> </a></li>
                                    <li><a class="icon-color lin" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Linkedin"><i class="fab fa-linkedin"></i> </a></li>
                                    <li><a class="icon-color pin" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Linkedin"><i class="fab fa-pinterest-p"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear: both"></div>
                <div class="col-xl-12">
                    <div class="copy-info text-center"> © 2021 {{env('APP_NAME')}}. All Rights Reserved. </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('theme')}}/js/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('theme')}}/js/popper.min.js" type="text/javascript"></script>
<script src="{{asset('theme')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('theme')}}/js/functions.js" type="text/javascript"></script>
<script src="{{asset('theme')}}/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="{{asset('theme')}}/js/slick.js" type="text/javascript"></script>
<script src="{{asset('theme')}}/js/swiper.min.js" type="text/javascript"></script>
<script src="{{asset('theme')}}/js/main.js" type="text/javascript"></script>
</body>
</html>
