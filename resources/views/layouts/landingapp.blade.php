<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mironmahmud.com/classicads/assets/ltr-version/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 May 2021 15:04:59 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{env('APP_NAME')}}</title>
{{--    <link rel="icon" href="images/favicon.png">--}}
    <link rel="stylesheet" href="{{url('')}}/newtheme/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{url('')}}/newtheme/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="{{url('')}}/newtheme/css/vendor/slick.min.css">
    <link rel="stylesheet" href="{{url('')}}/newtheme/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('')}}/newtheme/css/custom/main.css">
    <link rel="stylesheet" href="{{url('')}}/newtheme/css/custom/index.css">
</head>
<body>
<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-left">
                <ul class="header-widget">
                    <li>
                        <button type="button" class="header-menu"><i class="fas fa-align-left"></i></button>
                    </li>
                    <li><a href="{{url('')}}" class="header-logo"><img src="{{url('')}}/logo.png" alt="logo" style="width: 150px;height: 70px"></a></li>
                    <li><a href="{{url('user-login')}}" class="header-user"><i class="fas fa-user"></i><span>Login</span></a>
                    </li>
                    <li>
                        <button type="button" class="header-src"><i class="fas fa-search"></i></button>
                    </li>
                </ul>
            </div>
            <form class="header-search">
                <div class="header-main-search">
                    <button type="submit" class="header-search-btn"><i class="fas fa-search"></i></button>
                    <input type="text" class="form-control" placeholder="Search, Whatever you needs...">
{{--                    <button type="button" class="header-option-btn tooltip"><i class="fas fa-sliders-h"></i><span--}}
{{--                            class="tooltext left">FilterOption</span></button>--}}
                </div>
                <div class="header-search-option">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group"><input type="text" class="form-control" placeholder="City"></div>
                        </div>
                        <div class="col-6">
                            <div class="form-group"><input type="text" class="form-control" placeholder="State"></div>
                        </div>
                        <div class="col-6">
                            <div class="form-group"><input type="text" class="form-control" placeholder="Category">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group"><input type="number" class="form-control" placeholder="Price"></div>
                        </div>
                        <div class="col-12">
                            <div class="form-btn">
                                <button type="submit" class="btn btn-inline"><i class="fas fa-search"></i><span>Search Here</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="header-right">
                <ul class="header-widget">
                    <li>
                        <button class="header-favourite"><i class="fas fa-heart"></i><sup>0</sup></button>
                    </li>
{{--                    <li>--}}
{{--                        <button class="header-notify"><i class="fas fa-bell"></i><sup>0</sup></button>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <button class="header-message"><i class="fas fa-envelope"></i><sup>0</sup></button>--}}
{{--                    </li>--}}
                </ul>
                <a href="{{url('add-classified')}}" class="btn btn-inline"><i
                        class="fas fa-plus-circle"></i><span>post your ad</span></a></div>
        </div>
    </div>
</header>
<div class="sidebar-part">
    <div class="sidebar-body">
        <div class="sidebar-header"><a href="{{url('')}}" class="sidebar-logo"><img src="{{url('')}}/logo.png" alt="logo" style="width: 150px;height: 70px"></a>
            <button class="sidebar-cross"><i class="fas fa-times"></i></button>
        </div>
        <div class="sidebar-content">
            <div class="sidebar-profile">
{{--                <a href="#" class="sidebar-avatar">--}}
{{--                    <img src="images/avatar/01.jpg" alt="avatar">--}}
{{--                </a>--}}
                <h4><a href="#" class="sidebar-name">{{\App\User::where('id', \Illuminate\Support\Facades\Session::get('userId'))->first()['name'] ?? 'USER'}}</a></h4><a href="{{url('add-classified')}}" class="btn btn-inline sidebar-btn"><i
                        class="fas fa-plus-circle"></i><span>post your ad</span></a></div>
            <div class="sidebar-menu">
                <ul class="nav nav-tabs">
                    <li><a href="#main-menu" class="nav-link active" data-toggle="tab">Main Menu</a></li>
                    <li><a href="#author-menu" class="nav-link" data-toggle="tab">Author Menu</a></li>
                </ul>
                <div class="tab-pane active" id="main-menu">
                    <ul class="navbar-list">
                        <li class="navbar-item"><a class="navbar-link" href="{{url('')}}">Home</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('classified')}}">Classifieds</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('events')}}">Events</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('movies')}}">Movies</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('forum')}}">Forum</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('/')}}">About</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="tab-pane" id="author-menu">
                    <ul class="navbar-list">
                        <li class="navbar-item"><a class="navbar-link" href="{{url('home')}}">Dashboard</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('my-classifieds')}}">My Classifieds</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('my-events')}}">My Events</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('my-profile')}}">My Profile</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('my-movies')}}">My Movies</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="{{url('logout-user')}}">Logout</a></li>
                    </ul>
                </div>
            </div>
{{--            <div class="sidebar-footer"><p>All Rights Reserved By <a href="#">Classicads</a></p>--}}
{{--                <p>Developed By <a href="https://themeforest.net/user/mironcoder">Mironcoder</a></p></div>--}}
        </div>
    </div>
</div>
<div class="btmbar-part">
    <div class="container">
        <ul class="btmbar-widget">
            <li><a class="navbar-link" href="{{url('classified')}}">Classifieds</a</li>
            <li><a class="navbar-link" href="{{url('events')}}">Events</a></li>
            <li><a class="plus-btn" href="{{url('add-classified')}}"><i class="fas fa-plus"></i><span>Ad Your Post</span></a></li>
            <li><a class="navbar-link" href="{{url('movies')}}">Movies</a></li>
            <li><a class="navbar-link" href="{{url('forum')}}">Forum</a></li>
        </ul>
    </div>
</div>

@yield('content')


<footer class="footer-part">
    <div class="container">
        <div class="row newsletter">
            <div class="col-lg-6">
                <div class="news-content"><h2>Subscribe for Latest Offers</h2>
{{--                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, aliquid reiciendis!--}}
{{--                        Exercitationem soluta provident non.</p>--}}
                </div>
            </div>
            <div class="col-lg-6">
                <form class="news-form"><input type="text" placeholder="Enter Your Email Address">
                    <button class="btn btn-inline"><i class="fas fa-envelope"></i><span>Subscribe</span></button>
                </form>
            </div>
        </div>
        <div class="row" style="margin-bottom: 50px">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-content"><h3>Contact Us</h3>
                    <ul class="footer-address">
                        <li><i class="fas fa-map-marker-alt"></i>
                            <p>Toronto, ON, CA</p></li>
                        <li><i class="fas fa-envelope"></i>
                            <p>support@yaaritoronto.ca <span>info@yaaritoronto.ca</span></p></li>
                        <li><i class="fas fa-phone-alt"></i>
                            <p>+8801838288389 <span>+8801941101915</span></p></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-content"><h3>Quick Links</h3>
                    <ul class="footer-widget">
                        <li><a href="{{url('classifieds')}}">Classifieds</a></li>
                        <li><a href="{{url('events')}}">Events</a></li>
                        <li><a href="{{url('user-login')}}">My Account</a></li>
                        <li><a href="{{url('user-login')}}">Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-content"><h3>Information</h3>
                    <ul class="footer-widget">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-info"><a href="#"><img src="{{url('')}}/logo.png" alt="logo"></a>
                    <ul class="footer-count">
                        <li><h5>929,238</h5>
                            <p>Registered Users</p></li>
                        <li><h5>242,789</h5>
                            <p>Community Ads</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-end">
        <div class="container">
            <div class="footer-end-content"><p>All Copyrights Reserved &copy; 2021 - {{env('APP_NAME')}}</p>
                <ul class="social-transparent footer-social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="{{url('')}}/newtheme/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{url('')}}/newtheme/js/vendor/popper.min.js"></script>
<script src="{{url('')}}/newtheme/js/vendor/bootstrap.min.js"></script>
<script src="{{url('')}}/newtheme/js/vendor/slick.min.js"></script>
<script src="{{url('')}}/newtheme/js/custom/slick.js"></script>
<script src="{{url('')}}/newtheme/js/custom/main.js"></script>
</body>
<!-- Mirrored from mironmahmud.com/classicads/assets/ltr-version/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 May 2021 15:05:25 GMT -->
</html>
