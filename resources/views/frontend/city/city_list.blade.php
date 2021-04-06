@extends('frontend.layouts.template')
@section('main')
    <main id="main" class="site-main">
        <div class="site-content">
            
            <div class="container">
                <div class="member-wishlist-wrap">
                    <h1>{{__('Cities')}}</h1>
                    <div class="mw-box">
                        <div class="mw-grid golo-grid grid-4 ">
                            @foreach($cities as $city)
                                <div class="grid-item">
                                    @include('frontend.common.city_item')
                                </div>
                            @endforeach
                        </div>
                    </div><!-- .mw-box -->
                </div><!-- .member-wrap -->
                <div class="flex align-items-center justify-content-center">

                    {{$cities->links()}}
                </div>
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@stop