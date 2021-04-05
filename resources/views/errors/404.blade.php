@extends('frontend.layouts.template')
@section('main')
    <main id="main" class="site-main">
        <div class="page-title page-title--small align-left">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">{{__('404 Error')}}</h1>
                    <p class="page-title__slogan">{{__("Sorry, we couldn't find that page.")}}</p>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="site-content">
            <div class="container">
                <div class="error-wrap">
                    <h2>{{__('OOPS!')}}</h2>
                    <b>{{__("Sorry, we couldn't find that page.")}}</b>
                    <p>
                        {{__("We can't find the page or studio you're looking for.")}}<br>
                        {{__("Make sure you've typed in the URL correctly or try go")}} <a href="{{route('home')}}">{{__('Homepage')}}</a>
                    </p>
                </div>
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@stop