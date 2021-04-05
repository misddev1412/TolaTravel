@php
    $img_home_banner = getImageUrl(setting('home_banner'));
    $img_home_banner_app = getImageUrl(setting('home_banner_app'));
    if (setting('home_banner')) {
        $home_banner = "style=background-image:url({$img_home_banner})";
    } else {
        $home_banner = "style=background-image:url(/assets/images/top-banner.png)";
    }
    if (setting('home_banner_app')) {
        $home_banner_app = "style=background-image:url({$img_home_banner_app})";
    } else {
        $home_banner_app = "style=background-image:url(/assets/images/banner-apps.jpg)";
    }
@endphp
@extends('frontend.layouts.template')
@section('main')
    <main id="main" class="site-main">
        <div class="site-banner" {{$home_banner}}>
            <div class="container">
                <div class="site-banner__content golo-ajax-search">
                    <h1 class="site-banner__title">{{__('Explore the world')}}</h1>
                    <form action="{{route('search')}}" class="site-banner__search">
                        <div class="site-banner__search__field">
                            <span class="site-banner__search__icon">
                                <i class="la la-search la-24"></i>
                            </span><!-- .site-banner__search__icon -->
                            <input class="site-banner__search__input" type="text" name="keyword" placeholder="{{__('Type a city or location')}}" autocomplete="off">
                            <div class="search-result"></div>
                            <div class="golo-loading-effect"><span class="golo-dual-ring"></span></div>
                        </div><!-- .site-banner__search__input -->
                    </form><!-- .site-banner__search -->
                    <p class="site-banner__meta">
                        <span>{{__('Popular:')}}</span>
                        @foreach($popular_search_cities as $city)
                            <a href="{{route('city_detail', $city->slug)}}" title="{{$city->name}}">{{$city->name}}</a>
                        @endforeach
                    </p><!-- .site-banner__meta -->
                </div><!-- .site-banner__content -->
            </div>
        </div><!-- .site-banner -->
        <div class="cities">
            <div class="container">
                <h2 class="cities__title title">{{__('Popular cities')}}</h2>
                <div class="cities__content">
                    <div class="row">
                        @foreach($popular_cities as $city)
                            <div class="col-lg-3 col-sm-6">
                                <div class="cities__item hover__box">
                                    <div class="cities__thumb hover__box__thumb">
                                        <a title="London" href="{{route('city_detail', $city->slug)}}">
                                            <img src="{{getImageUrl($city->thumb)}}" alt="{{$city->name}}">
                                        </a>
                                    </div>
                                    <h4 class="cities__name">{{$city['country']['name']}}</h4>
                                    <div class="cities__info">
                                        <h3 class="cities__capital">{{$city->name}}</h3>
                                        <p class="cities__number">{{$city->places_count}} {{__('places')}}</p>
                                    </div>
                                </div><!-- .cities__item -->
                            </div>
                        @endforeach
                    </div>
                </div><!-- .cities__content -->
            </div>
        </div><!-- .cities -->
        <div class="banner-apps" {{$home_banner_app}}>
            <div class="container">
                <div class="banner-apps__content">
                    <h2 class="banner-apps__title">{{__('Get the App')}}</h2>
                    <p class="banner-apps__desc">{{__('Download the app and go to travel the world.')}}</p>
                    <div class="banner-apps__download">
                        <a title="App Store" href="#" class="banner-apps__download__iphone"><img src="{{asset('assets/images/assets/app-store.png')}}" alt="App Store"></a>
                        <a title="Google Play" href="#" class="banner-apps__download__android"><img src="{{asset('assets/images/assets/google-play.png')}}" alt="Google Play"></a>
                    </div>
                </div>
            </div>
        </div><!-- .banner-apps -->
        <div class="news">
            <div class="container">
                <h2 class="news__title title title--more">
                    {{__('Related stories')}}
                    <a href="{{route('post_list_all')}}" title="{{__('View more')}}">
                        {{__('View more')}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10">
                            <path fill="#23D3D3" fill-rule="nonzero" d="M5.356 4.64L.862.148A.503.503 0 1 0 .148.86l4.137 4.135L.148 9.132a.504.504 0 1 0 .715.713l4.493-4.492a.509.509 0 0 0 0-.713z"/>
                        </svg>
                    </a>
                </h2>
                <div class="news__content">
                    <div class="row">
                        @foreach($blog_posts as $post)
                            <div class="col-md-4">
                                <article class="post hover__box">
                                    <div class="post__thumb hover__box__thumb">
                                        <a title="{{$post->title}}" href="{{route('post_detail', [$post->slug, $post->id])}}"><img src="{{getImageUrl($post->thumb)}}" alt="{{$post->title}}"></a>
                                    </div>
                                    <div class="post__info">
                                        <ul class="post__category">
                                            @foreach($post['categories'] as $cat)
                                                <li><a title="{{$cat->name}}" href="{{route('post_list', $cat->slug)}}">{{$cat->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <h3 class="post__title"><a title="{{$post->title}}" href="{{route('post_detail', [$post->slug, $post->id])}}">{{$post->title}}</a></h3>
                                    </div>
                                </article>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div><!-- .news -->
    </main><!-- .site-main -->
@stop
