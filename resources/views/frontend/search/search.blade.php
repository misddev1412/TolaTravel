@extends('frontend.layouts.template')
@section('main')
    <main id="main" class="site-main">
        <div class="page-title page-title--small align-left">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">{{__('Search results')}}</h1>
                </div>
            </div>
        </div>

        <div class="site-content">
            <div class="container">
                <div class="search-wrap">

                    <h2>{{count($places)}} {{__('results for')}} "{{$keyword}}"</h2>

                    <div class="mw-box">
                        <div class="mw-grid golo-grid grid-4 ">
                            @foreach($places as $place)
                                <div class="grid-item">
                                    @include('frontend.common.place_item')
                                </div>
                            @endforeach
                        </div>
                    </div><!-- .mw-box -->

                    <div class="pagination">
                        {{$places->appends(['keyword' => $keyword])->render('frontend.common.pagination')}}
                    </div><!-- .pagination -->

                </div><!-- .member-wrap -->
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@stop