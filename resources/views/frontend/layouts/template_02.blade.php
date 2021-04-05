<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {!! SEO::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/jost/stylesheet.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/slick/slick-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.bubble.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.core.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.snow.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/chosen/chosen.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/photoswipe/photoswipe.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/photoswipe/default-skin/default-skin.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/lity/lity.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/gijgo/css/gijgo.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css?v=1.0')}}"/>

    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <script>
        var app_url = window.location.origin;
    </script>
</head>

<body>
<div id="wrapper">
    <header id="header" class="site-header {{!isRoute('home') ?: 'home-header home-header-while'}}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-8">
                    <div class="site">
                        <div class="site__menu">
                            <a title="Menu Icon" href="#" class="site__menu__icon">
                                <i class="las la-bars la-24-black"></i>
                            </a>
                            <div class="popup-background"></div>
                            <div class="popup popup--left">
                                <a title="Close" href="#" class="popup__close">
                                    <i class="las la-times la-24-black"></i>
                                </a><!-- .popup__close -->
                                <div class="popup__content">
                                    @guest
                                        <div class="popup__user popup__box open-form">
                                            <a title="Login" href="#" class="open-login">{{__('Login')}}</a>
                                            <a title="Sign Up" href="#" class="open-signup">{{__('Sign Up')}}</a>
                                        </div>
                                    @else
                                        <div class="account">
                                            <a href="#" title="{{Auth::user()->name}}">
                                                <img src="{{getUserAvatar(user()->avatar)}}" alt="{{Auth::user()->name}}">
                                                <span>
                                                    {{Auth::user()->name}}
                                                    <i class="la la-angle-down la-12"></i>
                                                </span>
                                            </a>
                                            <div class="account-sub">
                                                <ul>
                                                    <li class="{{isActiveMenu('user_profile')}}"><a href="{{route('user_profile')}}">{{__('Profile')}}</a></li>
                                                    <li class="{{isActiveMenu('user_my_place')}}"><a href="{{route('user_my_place')}}">{{__('My Places')}}</a></li>
                                                    <li class="{{isActiveMenu('user_wishlist')}}"><a href="{{route('user_wishlist')}}">{{__('Wishlist')}}</a></li>
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                                                        <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .account -->
                                    @endguest
                                    <div class="popup__destinations popup__box">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a title="Destinations" href="#">{{__('Destinations')}}</a>
                                                <ul class="sub-menu">
                                                    @foreach($destinations as $city)
                                                        <li><a href="{{route('page_search_listing', ['city[]' => $city->id])}}" title="{{$city->name}}">{{$city->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- .popup__destinations -->
                                    <div class="popup__menu popup__box">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a title="Home demo" href="{{route('home')}}">Home</a>
                                                <ul class="sub-menu">
                                                    <li><a href="https://lara-business.getgolo.com">Business Listing</a></li>
                                                    <li><a href="https://lara-cityguide.getgolo.com">City Guide</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a title="Place detail" href="#">Place detail</a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('place_detail', 'boot-cafe')}}">Booking form</a></li>
                                                    <li><a href="{{route('place_detail', 'le-meurice')}}">Affiliate Book Buttons</a></li>
                                                    <li><a href="{{route('place_detail', 'musee-guimet')}}">Affiliate Banner Ads</a></li>
                                                    <li><a href="{{route('place_detail', 'clamato')}}">Enquiry Form</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a title="Page" href="#">Page</a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('home')}}/post/about-us-10">About</a></li>
                                                    <li><a href="{{route('home')}}/page-404">404</a></li>
                                                    <li><a href="{{route('home')}}/post/faqs-11">Faqs</a></li>
                                                    <li><a href="{{route('page_landing', '03')}}">App Landing</a></li>
                                                    <li><a href="{{route('page_landing', '01')}}">Construction</a></li>
                                                    <li><a href="{{route('page_landing', '02')}}">Coming Soon</a></li>
                                                </ul>
                                            </li>
                                            <li><a title="Blog" href="{{route('post_list_all')}}">Blog</a></li>
                                            <li><a title="Contacts" href="{{route('page_contact')}}">Contact</a></li>
                                        </ul>
                                    </div><!-- .popup__menu -->
                                </div><!-- .popup__content -->
                                <div class="popup__button popup__box">
                                    <a class="btn" href="{{route('place_addnew')}}">
                                        <i class="la la-plus la-24"></i>
                                        <span>{{__('Add place')}}</span>
                                    </a>
                                </div><!-- .popup__button -->
                            </div><!-- .popup -->
                        </div><!-- .site__menu -->
                        <div class="site__brand">
                            <a title="Logo" href="{{route('home')}}" class="site__brand__logo"><img src="{{asset(setting('logo') ? 'uploads/' . setting('logo') : 'assets/images/assets/logo.png')}}" alt="logo"></a>
                        </div><!-- .site__brand -->
                        @unless(isRoute('home'))
                            <div class="site__search layout-02">
                                <a title="Close" href="#" class="search__close">
                                    <i class="la la-times"></i>
                                </a><!-- .search__close -->
                                <form action="{{route('page_search_listing')}}" class="site-banner__search layout-02">
                                    <div class="field-input">
                                        <label for="input_search">{{__('Find')}}</label>
                                        <input class="site-banner__search__input open-suggestion" id="input_search" type="text" name="keyword" placeholder="Ex: fastfood, beer" autocomplete="off">
                                        <input type="hidden" name="category[]" id="category_id">
                                        <div class="search-suggestions category-suggestion">
                                            <ul>
                                                <li><a href="#"><span>{{__('Loading...')}}</span></a></li>
                                            </ul>
                                        </div>
                                    </div><!-- .site-banner__search__input -->
                                    <div class="field-input">
                                        <label for="location_search">{{__('Where')}}</label>
                                        <input class="site-banner__search__input open-suggestion" id="location_search" type="text" name="city_name" placeholder="Your city" autocomplete="off">
                                        <input type="hidden" id="city_id">
                                        <div class="search-suggestions location-suggestion">
                                            <ul>
                                                <li><a href="#"><span>{{__('Loading...')}}</span></a></li>
                                            </ul>
                                        </div>
                                    </div><!-- .site-banner__search__input -->
                                    <div class="field-submit">
                                        <button><i class="las la-search la-24-black"></i></button>
                                    </div>
                                </form><!-- .site-banner__search -->
                            </div>
                        @endunless
                    </div><!-- .site -->
                </div><!-- .col-md-6 -->


                <div class="col-md-6 col-4">
                    <div class="right-header align-right">
                        <div class="right-header__languages">
                            <a href="#">
                                <img src="{{flagImageUrl(\Illuminate\Support\Facades\App::getLocale())}}">
                                @if(count($languages) > 1)
                                    <i class="las la-angle-down la-12-black"></i>
                                @endif
                            </a>
                            @if(count($languages) > 1)
                                <ul>
                                    @foreach($languages as $language)
                                        @if(\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                                            <li><a href="{{route('change_language', $language->code)}}" title="{{$language->name}}"><img src="{{flagImageUrl($language->code)}}">{{$language->name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class="right-header__destinations">
                            <a title="Destinations" href="#">
                                {{__('Destinations')}}
                                <i class="las la-angle-down la-12-black"></i>
                            </a>
                            <ul>
                                @foreach($destinations as $city)
                                    <li><a href="{{route('page_search_listing', ['city[]' => $city->id])}}" title="{{$city->name}}">{{$city->name}}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- .right-header__destinations -->

                        @guest
                            <div class="right-header__login">
                                <a title="Login" class="open-login" href="#">{{__('Login')}}</a>
                            </div><!-- .right-header__login -->
                            <div class="popup popup-form">
                                <a title="Close" href="#" class="popup__close">
                                    <i class="las la-times la-24-black"></i>
                                </a><!-- .popup__close -->
                                <ul class="choose-form">
                                    <li class="nav-login"><a title="Log In" href="#login">{{__('Log In')}}</a></li>
                                    <li class="nav-signup"><a title="Sign Up" href="#register">Sign Up</a></li>
                                </ul>
                                <p class="choose-more">{{__('Continue with')}} <a title="Facebook" class="fb" href="{{route('login_social', 'facebook')}}">Facebook</a> or <a title="Google" class="gg" href="{{route('login_social', 'google')}}">Google</a></p>
                                <p class="choose-or"><span>{{__('Or')}}</span></p>
                                <div class="popup-content">

                                    <form action="{{route('login')}}" class="form-log form-content" id="login" method="POST">
                                        @csrf
                                        <div class="field-input">
                                            <input type="text" id="email" name="email" placeholder="Email Address" required>
                                        </div>
                                        <div class="field-input">
                                            <input type="password" id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <a title="Forgot password" class="forgot_pass" href="#">{{__('Forgot password')}}</a>
                                        {{--                                    <input type="submit" name="submit" value="Login">--}}
                                        <button type="submit" class="gl-button btn button w-100" id="submit_login">{{__('Login')}}</button>
                                    </form>
                                    <form class="form-sign form-content" id="register" action="{{route('register')}}" method="post">
                                        @csrf
                                        <small class="form-text text-danger golo-d-none" id="register_error">error!</small>
                                        <div class="field-input">
                                            <input type="text" id="register_name" name="name" placeholder="Full Name" required>
                                        </div>
                                        <div class="field-input">
                                            <input type="email" id="register_email" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="field-input">
                                            <input type="password" id="register_password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="field-input">
                                            <input type="password" id="register_password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                        <div class="field-check">
                                            <label for="accept">
                                                <input type="checkbox" id="accept" checked required>
                                                Accept the <a title="Terms" href="#">Terms</a> and <a title="Privacy Policy" href="#">Privacy Policy</a>
                                                <span class="checkmark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                                    <path fill="#FFF" fill-rule="nonzero" d="M2.166 4.444L.768 3.047 0 3.815 1.844 5.66l.002-.002.337.337L7.389.788 6.605.005z"/>
                                                </svg>
                                            </span>
                                            </label>
                                        </div>
                                        <button type="submit" class="gl-button btn button w-100" id="submit_register">{{__('Sign Up')}}</button>
                                    </form>

                                </div>
                            </div><!-- .popup-form -->
                        @else
                            <div class="account">
                                <a href="#" title="{{Auth::user()->name}}">
                                    <img src="{{getUserAvatar(user()->avatar)}}" alt="{{Auth::user()->name}}">
                                    <span>
										{{Auth::user()->name}}
										<i class="la la-angle-down la-12"></i>
									</span>
                                </a>
                                <div class="account-sub">
                                    <ul>
                                        @if(user()->isAdmin())
                                            <li class="{{isActiveMenu('admin_dashboard')}}"><a href="{{route('admin_dashboard')}}" target="_blank" rel="nofollow">{{__('Dashboard')}}</a></li>
                                        @endif
                                        <li class="{{isActiveMenu('user_profile')}}"><a href="{{route('user_profile')}}">{{__('Profile')}}</a></li>
                                        <li class="{{isActiveMenu('user_my_place')}}"><a href="{{route('user_my_place')}}">{{__('My Places')}}</a></li>
                                        <li class="{{isActiveMenu('user_wishlist')}}"><a href="{{route('user_wishlist')}}">{{__('Wishlist')}}</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                                            <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .account -->
                        @endguest
                        <div class="right-header__search">
                            <a title="Search" href="#" class="search-open">
                                <i class="las la-search la-24-black"></i>
                            </a>
                        </div>
                        <div class="right-header__button btn">
                            <a title="Add place" href="{{route('place_addnew')}}">
                                <i class="las la-plus la-24-white"></i>
                                <span>{{__('Add place')}}</span>
                            </a>
                        </div><!-- .right-header__button -->
                    </div><!-- .right-header -->
                </div><!-- .col-md-6 -->
            </div><!-- .row -->


        </div><!-- .container-fluid -->
    </header><!-- .site-header -->

    @yield('main')

    <footer id="footer" class="footer layout-02">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="footer__top__info">
                            <a title="Logo" href="#" class="footer__top__info__logo"><img src="{{asset(setting('logo') ? 'uploads/' . setting('logo') : 'assets/images/assets/logo.png')}}" alt="Golo"></a>
                            <p class="footer__top__info__desc">{{__('Sign-up to receive regular updates from us.')}}</p>
                            <form action="#" class="footer-subscribe">
                                <div class="field-input">
                                    <input type="email" name="email" placeholder="Enter your email" value="">
                                </div>
                                <button><i class="las la-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <aside class="footer__top__nav">
                            <h3>{{__('Company')}}</h3>
                            <ul>
                                <li><a href="{{url('post/about-us-10')}}">{{__('About Us')}}</a></li>
                                <li><a href="{{route('post_list_all')}}">{{__('Blog')}}</a></li>
                                <li><a href="">{{__('Faqs')}}</a></li>
                                <li><a href="{{route('page_contact')}}">{{__('Contact')}}</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-2">
                        <aside class="footer__top__nav">
                            <h3>{{__('Support')}}</h3>
                            <ul>
                                <li><a href="#">Get in Touch</a></li>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Live chat</a></li>
                                <li><a href="#">How it works</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-3">
                        <aside class="footer__top__nav footer__top__nav--contact">
                            <h3>{{__('Contact Us')}}</h3>
                            <p>{{__('Email: support@domain.com')}}</p>
                            <p>{{__('Phone: 1 (00) 832 2342')}}</p>
                            <ul>
                                <li>
                                    <a title="Facebook" href="#">
                                        <i class="la la-facebook la-24"></i>
                                    </a>
                                </li>
                                <li>
                                    <a title="Twitter" href="#">
                                        <i class="la la-twitter la-24"></i>
                                    </a>
                                </li>
                                <li>
                                    <a title="Youtube" href="#">
                                        <i class="la la-youtube la-24"></i>
                                    </a>
                                </li>
                                <li>
                                    <a title="Instagram" href="#">
                                        <i class="la la-instagram la-24"></i>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div><!-- .top-footer -->
            <div class="footer__bottom">
                <p class="footer__bottom__copyright">{{now()->year}} &copy; <a href="{{__('https://uxper.co')}}" target="_blank">{{__('UxPer')}}</a>. {{__('All rights reserved.')}}</p>
            </div><!-- .top-footer -->
        </div><!-- .container -->
    </footer><!-- site-footer -->
    @if(isRoute('home'))
        @php
            $img_home_banner_app = getImageUrl(setting('home_banner_app'));
            if (setting('home_banner_app')) {
                $home_banner_app = "style=background-image:url({$img_home_banner_app})";
            } else {
                $home_banner_app = "style=background-image:url(/assets/images/bg-app.png)";
            }
        @endphp
        <div class="landing-banner business-landing-banner" {{$home_banner_app}}>
            <div class="container">
                <div class="lb-info">
                    <h2>{{__('The Golo App')}}</h2>
                    <p>{{__('Download the app and go to travel the world.')}}</p>
                    <div class="lb-button">
                        <a href="#" title="App store"><img src="{{asset('assets/images/app-store.png')}}" alt="App store"></a>
                        <a href="#" title="Google play"><img src="{{asset('assets/images/google-play.png')}}" alt="Google play"></a>
                    </div>
                </div><!-- .lb-info -->
            </div>
        </div><!-- .landing-banner -->
    @endif
</div><!-- #wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/libs/jquery-1.12.4.js')}}"></script>
<script src="{{asset('assets/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/libs/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/libs/slick/jquery.zoom.min.js')}}"></script>
<script src="{{asset('assets/libs/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/libs/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('assets/libs/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('assets/libs/lity/lity.min.js')}}"></script>
<script src="{{asset('assets/libs/quilljs/js/quill.core.js')}}"></script>
<script src="{{asset('assets/libs/quilljs/js/quill.js')}}"></script>
<script src="{{asset('assets/libs/gijgo/js/gijgo.min.js')}}"></script>
<script src="{{asset('assets/libs/chosen/chosen.jquery.min.js')}}"></script>
<!-- orther script -->
<script src="{{asset('assets/js/main_business.js?v=1.0')}}"></script>
<script src="{{asset('assets/js/custom.js?v=1.0')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{setting('goolge_map_api_key', 'AIzaSyD-2mhVoLX7oIOgRQ-6bxlJt4TF5k0xhWc')}}&libraries=places&language={{\Illuminate\Support\Facades\App::getLocale()}}"></script>

@stack('scripts')

</body>
</html>
