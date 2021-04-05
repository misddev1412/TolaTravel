@extends('frontend.layouts.template')
@php
    $landing_banner = "style=background-image:url(/assets/images/bg-app.png)";
    $landing_banner2 = "style=background-image:url(/assets/images/ld-banner-02.png)";
@endphp
@section('main')
    <main id="main" class="site-main">
        <div class="site-content">
            <div class="landing-banner" {{$landing_banner}}>
                <div class="container">
                    <div class="lb-info">
                        <h2>The Golo App</h2>
                        <p>Download the app and go to travel the world.</p>
                        <div class="lb-button">
                            <a href="#" title="App store"><img src="{{asset('assets/images/app-store.png')}}" alt="App store"></a>
                            <a href="#" title="Google play"><img src="{{asset('assets/images/google-play.png')}}" alt="Google play"></a>
                        </div>
                    </div><!-- .lb-info -->
                </div>
            </div><!-- .landing-banner -->
            <div class="img-box-inner">
                <div class="container">
                    <div class="title ld-title">
                        <h2>How It Works</h2>
                        <p>From its medieval origins to the digital era.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="img-box-item">
                                <img src="{{asset('assets/images/pelican.png')}}" alt="">
                                <h3>Discover</h3>
                                <p>Take a deep dive and try our list of over 40 unique generators</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="img-box-item">
                                <img src="{{asset('assets/images/island.png')}}" alt="">
                                <h3>Local tips</h3>
                                <p>Find placeholder images for your next design.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="img-box-item">
                                <img src="{{asset('assets/images/surf.png')}}" alt="">
                                <h3>Plan your trip</h3>
                                <p>Excepteur sint occaecat cupidatat non proident</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .img-box-inner -->
            <div class="features-inner">
                <div class="container">
                    <div class="title ld-title">
                        <h2>Best Features</h2>
                        <p>Lorem ipsum is placeholder text commonly used in the graphic.</p>
                    </div><!-- .title -->
                    <div class="features-item">
                        <div class="features-thumb">
                            <img src="{{asset('assets/images/features-01.png')}}" alt="Trending Ui/Ux Design">
                        </div>
                        <div class="features-info">
                            <h3>Trending <br> <span>Ui/Ux</span> Design</h3>
                            <p>Post directly to Instagram, email clients about what you’re up to, or send newsletters with announcements about new work or exhibitions. </p>
                            <a href="#" class="more" title="Read more">Read more</a>
                        </div>
                    </div><!-- .features-item -->
                    <div class="features-item">
                        <div class="features-thumb">
                            <img src="{{asset('assets/images/features-02.png')}}" alt="Bringing it all together">
                        </div>
                        <div class="features-info">
                            <h3>Bringing it <br> all <span>together</span></h3>
                            <p>Post directly to Instagram, email clients about what you’re up to, or send newsletters with announcements about new work or exhibitions. </p>
                            <a href="#" class="more" title="Read more">Read more</a>
                        </div>
                    </div><!-- .features-item -->
                    <div class="features-item">
                        <div class="features-thumb">
                            <img src="{{asset('assets/images/features-03.png')}}" alt="Keep your audience update">
                        </div>
                        <div class="features-info">
                            <h3>Keep your <br> <span>audience</span> update</h3>
                            <p>Post directly to Instagram, email clients about what you’re up to, or send newsletters with announcements about new work or exhibitions. </p>
                            <a href="#" class="more" title="Read more">Read more</a>
                        </div>
                    </div><!-- .features-item -->
                </div>
            </div><!-- .features -->
            <div class="landing-banner" {{$landing_banner2}}>
                <div class="container">
                    <div class="lb-info">
                        <h2>Download App</h2>
                        <p>Download the app and go to travel the world.</p>
                        <div class="lb-button">
                            <a href="#" title="App store"><img src="{{asset('assets/images/app-store.png')}}" alt="App store"></a>
                            <a href="#" title="Google play"><img src="{{asset('assets/images/google-play.png')}}" alt="Google play"></a>
                        </div>
                    </div><!-- .lb-info -->
                </div>
            </div><!-- .landing-banner -->
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@stop