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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.bubble.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.core.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quilljs/css/quill.snow.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/chosen/chosen.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/photoswipe/photoswipe.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/photoswipe/default-skin/default-skin.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/lity/lity.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/gijgo/css/gijgo.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/lightslider.min.css')}}"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @if(setting('style_rtl'))
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive-rtl.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom-rtl.css?v=1.0')}}"/>
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css?v=' . time())}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css?v=' . time())}}"/>
    @endif

    <link rel="icon" sizes="16x16" href="https://storage.googleapis.com/exchange-289306.appspot.com/tola/favicon.png">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <script>
        var app_url = window.location.origin;
    </script>
    @stack('style')
</head>
@if(Auth::check() && Auth::user()->giftDaily == null)
<div class="overlay-gift" >
    <img class="close__gift" onclick="receiveToin()" src="https://storage.googleapis.com/exchange-289306.appspot.com/tola/gift1.png">
    <img class="open__gift"  style="display:none" src="https://storage.googleapis.com/exchange-289306.appspot.com/tola/gift2.png?v=1">
    <div class="toin" style="display:none">+ <img class="toin__icon" src="https://storage.googleapis.com/exchange-289306.appspot.com/tola/toin.png" width="20" alt=""><span class="toin__amount">1123</span></div>
    <div onclick="closeReceiveCoin()" class="close__button__gift"><i class="las la-times la-64"></i></div>
</div>
@endif
<body dir="{{!setting('style_rtl') ?: 'rtl'}}">
<div id="wrapper">
    <header id="header" class="site-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-12">
                    <div class="site site__container">
                        <div class="site__menu">
                            <a title="Menu Icon" href="#" class="site__menu__icon">
                                <i class="la la-bars la-24"></i>
                            </a>
                            <div class="popup-background"></div>
                            <div class="popup popup--left">
                                <a title="Close" href="#" class="popup__close">
                                    <i class="la la-times la-24"></i>
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

                                    {{-- @php var_dump(mylattitue()); @endphp
                                    @if(!empty(mylattitue())) --}}
                                   
                                    <div class="popup__destinations popup__box">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a title="Language" href="#">{{__('Language')}}</a>
                                                <ul class="sub-menu">
                                                    @foreach($languages as $language)

                                                        @if(\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                                                            <li><a href="{{route('change_language', $language->code)}}" title="{{$language->name}}">{{$language->name}}</a></li>
                                                        @endif
                                                    @endforeach
                                                  
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- .popup__destinations -->
                                    <div class="popup__destinations popup__countries popup__box">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a title="Country" href="#">{{__('Country')}}</a>
                                                <ul class="sub-menu">
                                                    @php
                                                    if(Session::has('country_id') || (Auth::check() && Auth::user()->country_id != null)) {
                                                        $acticeCountry = Session::get('country_id') ?? Auth::user()->country_id;
                                                    }
                                                    @endphp
                                                    @foreach($countries as $country)
                                                        <li @if(!empty($acticeCountry) && $country->id == $acticeCountry) class="active" @endif><a title="{{$country->name}}" onclick="changeCountry({{$country->id}}, '{{$country->name}}')">{{$country->name}}</a></li>
                                                    @endforeach
                                                  
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- .popup__destinations -->
                                    <div class="popup__destinations popup__box">
                                        <ul class="menu-arrow">
                                            <li>
                                                <a title="Destinations" href="#">{{__('Destinations')}}</a>
                                                <ul class="sub-menu">
                                                    @foreach($destinations as $city)
                                                        <li><a href="{{route('city_detail', $city->slug)}}" title="{{$city->name}}">{{$city->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- .popup__destinations -->
                                    <div class="popup__menu popup__box">
                                        <ul class="menu-arrow">
                                           
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
                        <div class="right-header__search d-block d-md-none">
                            <a title="Search" href="#" class="search-open">
                                <i class="la la-search la-24"></i>
                            </a>
                        </div>
                        @unless(isRoute('home'))
                            @if(setting('template', '01') == '01')
                                <div class="site__search golo-ajax-search">
                                    <a title="Close" href="#" class="search__close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                            <path fill="#5D5D5D" fill-rule="nonzero" d="M9.3 8.302l6.157-6.156a.706.706 0 1 0-.999-.999L8.302 7.304 2.146 1.148a.706.706 0 1 0-.999.999l6.157 6.156-6.156 6.155a.706.706 0 0 0 .998.999L8.302 9.3l6.156 6.156a.706.706 0 1 0 .998-.999L9.301 8.302z"/>
                                        </svg>
                                    </a><!-- .search__close -->
                                    <form action="{{route('search')}}" class="site__search__form" method="GET">
                                        <div class="site__search__field">
                                    <span class="site__search__icon">
                                        <i class="la la-search la-24"></i>
                                    </span><!-- .site__search__icon -->
                                            <input class="site__search__input" type="text" name="keyword" placeholder="{{__('Search places ...')}}" autocomplete="off">
                                            <div class="search-result"></div>
                                            <div class="golo-loading-effect"><span class="golo-loading"></span></div>
                                        </div><!-- .search__input -->
                                    </form><!-- .search__form -->
                                </div><!-- .site__search -->
                            @else
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
                            @endif
                        @endunless

                    </div><!-- .site -->
                </div><!-- .col-md-6 -->


                <div class="col-md-7 col-12">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="right-header align-right">
                                @if(!empty(mylattitue()))
                                <div class="weather">
                                    <img src="http://openweathermap.org/img/wn/{{mylattitue()['weather'][0]['icon']}}.png" alt=""> {{k_to_c(mylattitue()['main']['temp'])}} &#x2103;
        
                                </div>
                                @endif
                                <div class="right-header__languages">
                                    <a href="#" >
                                        @foreach($languages as $language)
                                            @if(\Illuminate\Support\Facades\App::getLocale() == $language->code)
                                            <i class="las la-language la-24"></i> <a title="{{$language->name}}">{{$language->name}}</a>
                                            @endif
                                        @endforeach
        
                                        @if(count($languages) > 1)
                                            <i class="las la-angle-down la-12-black"></i>
                                        @endif
                                    </a>
                                    @if(count($languages) > 1)
                                        <ul>
                                            @foreach($languages as $language)
                                                @if(\Illuminate\Support\Facades\App::getLocale() !== $language->code)
                                                    <li><a href="{{route('change_language', $language->code)}}" title="{{$language->name}}">{{$language->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
        
                                <div class="right-header__destinations right-header__countries">
                                    <a title="Country" href="#" class="d-flex align-items-center">
                                        <i class="las la-globe la-24"></i> 
                                        @if(Session::has('country_id') || (Auth::check() && Auth::user()->country_id != null))
                                            
                                            <span class="country_select">{{getCountry(Session::get('country_id') ?? Auth::user()->country_id)->name ?? __('Country')}}</span>
                                        @else
                                            <span class="country_select">{{__('Country')}}</span>
                                        @endif
                                        
                                        <i class="las la-angle-down la-12-black ml-1"></i>
                                    </a>
                                    <ul>
                                        @foreach($countries as $country)
                                            <li><a title="{{$country->name}}" onclick="changeCountry({{$country->id}}, '{{$country->name}}')">{{$country->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- .right-header__countries -->
        
                                <div class="right-header__destinations">
                                    <a title="Destinations" href="#" class="d-flex align-items-center">
                                        <i class="las la-archway la-24"></i> {{__('Destinations')}}
                                        <i class="la la-angle-down la-12"></i>
                                    </a>
                                    <ul>
                                        @foreach($destinations as $city)
                                            <li><a href="{{route('city_detail', $city->slug)}}" title="{{$city->name}}">{{$city->name}}</a></li>
                                        @endforeach
                                        @if(Session::get('country_id') || Auth::check() && Auth::user()->country_id)
                                            <li><a href="{{route('city_more_by_country', Session::get('country_id') ?? Auth::user()->country_id)}}" title="{{__('View more')}}">{{__('View more')}}</a></li>
        
                                        @endif
        
                                    </ul>
                                </div><!-- .right-header__destinations -->
                                @guest
                                    <div class="right-header__login">
                                        <a title="Login" class="open-login" href="#">{{__('Login')}}</a>
                                    </div><!-- .right-header__login -->
                                    <div class="right-header__signup">
                                        <a title="Sign Up" class="open-signup" href="#">{{__('Sign Up')}}</a>
                                    </div><!-- .right-header__signup -->
                                    <div class="popup popup-form">
                                        <a title="Close" href="#" class="popup__close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <path fill="#5D5D5D" fill-rule="nonzero" d="M9.3 8.302l6.157-6.156a.706.706 0 1 0-.999-.999L8.302 7.304 2.146 1.148a.706.706 0 1 0-.999.999l6.157 6.156-6.156 6.155a.706.706 0 0 0 .998.999L8.302 9.3l6.156 6.156a.706.706 0 1 0 .998-.999L9.301 8.302z"/>
                                            </svg>
                                        </a><!-- .popup__close -->
                                        <ul class="choose-form">
                                            <li class="nav-login"><a title="Log In" href="#login">{{__('Login')}}</a></li>
                                            <li class="nav-signup"><a title="Sign Up" href="#register">{{__('Sign Up')}}</a></li>
                                        </ul>
                                        <div class="popup-content">
        
                                            <form class="form-log form-content" id="login" action="{{route('login')}}" method="POST">
                                                @csrf
                                                <p class="choose-more">{{__('Continue with')}} <a title="Facebook" class="fb" href="{{route('login_social', 'facebook')}}">Facebook</a> or <a title="Google" class="gg" href="{{route('login_social', 'google')}}">Google</a></p>
                                                <p class="choose-or"><span>{{__('Or')}}</span></p>
        
                                                <small class="form-text text-danger golo-d-none" id="login_error">error!</small>
                                                <div class="field-input">
                                                    <input type="text" id="email" name="email" placeholder="Email Address" required>
                                                </div>
                                                <div class="field-input">
                                                    <input type="password" id="password" name="password" placeholder="Password" required>
                                                </div>
                                                <div class="choose-form mb-0">
                                                    <a title="Forgot password" class="forgot_pass" href="#forgot_password">{{__('Forgot password')}}</a>
                                                </div>
                                                <button type="submit" class="gl-button btn button w-100" id="submit_login">{{__('Login')}}</button>
                                            </form>
        
                                            <form class="form-sign form-content" id="register" action="{{route('register')}}" method="post">
                                                @csrf
                                                <p class="choose-more">{{__('Continue with')}} <a title="Facebook" class="fb" href="{{route('login_social', 'facebook')}}">Facebook</a> or <a title="Google" class="gg" href="{{route('login_social', 'google')}}">Google</a></p>
                                                <p class="choose-or"><span>{{__('Or')}}</span></p>
        
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
        
                                            <form class="form-forgotpass form-content" id="forgot_password" action="{{route('api_user_forgot_password')}}" method="POST">
                                                @csrf
                                                <p class="choose-or"><span>{{__('Lost your password? Please enter your email address. You will receive a link to create a new password via email.')}}</span></p>
                                                <small class="form-text text-danger golo-d-none" id="fp_error">error!</small>
                                                <small class="form-text text-success golo-d-none" id="fp_success">error!</small>
                                                <div class="field-input">
                                                    <input type="text" id="email" name="email" placeholder="Email Address" required>
                                                </div>
                                                <button type="submit" class="gl-button btn button w-100" id="submit_forgot_password">{{__('Forgot password')}}</button>
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
        
                                                <img style="width:20px;height:20px" src="https://storage.googleapis.com/exchange-289306.appspot.com/tola/toin.png" width="10"> <span style="margin-top:1px">{{number_format(Auth::user()->tcoin)}}</span>
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
                                <div class="right-header__button btn">

                                    <a title="Add place" href="{{route('place_addnew')}}">
                                        <i class="la la-plus la-24"></i>
                                        <span>{{__('Add place')}}</span>
                                    </a>
                                </div>
                            </div><!-- .right-header -->
                        </div>
                      
                    </div>
                </div><!-- .col-md-6 -->
            </div><!-- .row -->
           
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="second__menu">
                    
                        <div class="">
                            <ul class="menu__container">
                                <li class="menu__item">
                                    <a href="{{route('hotel_more_by_country', ['country_slug' => getCountryById($acticeCountry)->slug ?? 'all'])}}"><i class="fas fa-hotel"></i> {{__('Hotel')}}</a>
                                </li>
                                
                            </ul>
                        </div><!-- .right-header__button -->
                    </div>
                </div>
            </div>
        </div><!-- .container-fluid -->
    </header><!-- .site-header -->

    @yield('main')

    <footer id="footer" class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="footer__top__info">
                            <a title="Logo" href="#" class="footer__top__info__logo"><img src="{{asset(setting('logo') ? 'uploads/' . setting('logo') : 'assets/images/assets/logo.png')}}" alt="logo"></a>
                            <p class="footer__top__info__desc">{{__('Discover amazing things to do everywhere you go.')}}</p>
                            <div class="footer__top__info__app">
                                <a title="App Store" href="#" class="banner-apps__download__iphone"><img src="{{asset('assets/images/assets/app-store.png')}}" alt="App Store"></a>
                                <a title="Google Play" href="#" class="banner-apps__download__android"><img src="{{asset('assets/images/assets/google-play.png')}}" alt="Google Play"></a>
                            </div>
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
                <p class="footer__bottom__copyright">{{now()->year}} &copy; <a href="/" target="_blank">{{__('TolaTravels')}}</a>. {{__('All rights reserved.')}}</p>
            </div><!-- .top-footer -->
        </div><!-- .container -->
    </footer><!-- site-footer -->
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
<script src="{{asset('assets/js/lightslider.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- orther script -->
<script src="{{asset('assets/js/main.js?v=1.5')}}"></script>
<script src="{{asset('assets/js/custom.js?v=' . time())}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{setting('goolge_map_api_key', 'AIzaSyD-2mhVoLX7oIOgRQ-6bxlJt4TF5k0xhWc')}}&libraries=places&language={{\Illuminate\Support\Facades\App::getLocale()}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.js"></script>
@stack('scripts')

</body>
</html>
