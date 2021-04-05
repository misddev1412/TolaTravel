@extends('frontend.layouts.template')
@php
    $page_title_bg = "style='background-image:url(/assets/images/about-01.png)'";
@endphp
@section('main')
    <main id="main" class="site-main">
        <div class="page-title page-title--small align-left" {!! $page_title_bg !!}>
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">{{$post->title}}</h1>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="site-content">
            <div class="container">

                {!! $post->content !!}

            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@stop