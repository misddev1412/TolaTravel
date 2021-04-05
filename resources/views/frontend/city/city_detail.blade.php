@extends('frontend.layouts.template')

@php
    $banner_img = getImageUrl($city->banner);
    $page_title_bg = "style=background-image:url({$banner_img});";
@endphp

@section('main')
    <main class="site-main normal_view">
        <div class="maps-wrap">
            <div class="maps-button">
                <a href="#" id="mapview_close">
                    @if(setting('style_rtl'))
                        <i class="la la-arrow-right la-24"></i>
                    @else
                        <i class="la la-arrow-left la-24"></i>
                    @endif
                    {{__('Back to list')}}
                </a>
                <div class="field-select">
                    <select class="map_filter" id="category_id">
                        <option value="">{{__('Show all')}}</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}" {{isSelected($cat->slug, $cat_slug)}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                    <i class="la la-angle-down la-12"></i>
                </div>
                <input type="hidden" id="city_id" value="{{$city->id}}">
            </div>
            <div id="maps-view"></div>
        </div>

        <div class="page-title" {!! $page_title_bg !!}>
            <div class="container">
                <div class="page-title__content">
                    <h4 class="page-title__capita">{{$city['country']['name']}}</h4>
                    <h1 class="page-title__name">{{$city->name}}</h1>
                    <p class="page-title__slogan">{{$city->intro}}</p>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="intro">
            <div class="container">
                <h2 class="title">{{__('Introducing')}}</h2>
                <div class="intro__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="intro__text">{{$city->description}}</div>
                        </div>
                        <div class="col-lg-6">
                            <div class="intro__meta">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-item">
                                        <div class="intro__meta__item">
                                            <h3>{{__('Currency')}}</h3>
                                            <p>
                                                <i class="la la-money-bill-wave la-24"></i>
                                                <span>{{$city->currency}}</span>
                                            </p>
                                        </div><!-- .intro__meta__item -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-item">
                                        <div class="intro__meta__item">
                                            <h3>{{__('Languages')}}</h3>
                                            <p>
                                                <i class="la la-language la-24"></i>
                                                <span>{{$city->language}}</span>
                                            </p>
                                        </div><!-- .intro__meta__item -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-item">
                                        <div class="intro__meta__item">
                                            <h3>{{__('Best time to visit')}}</h3>
                                            <p>
                                                <i class="la la-calendar la-24"></i>
                                                <span>{{$city->best_time_to_visit}}</span>
                                            </p>
                                        </div><!-- .intro__meta__item -->
                                    </div>
                                </div>
                            </div><!-- .intro__meta -->
                        </div>
                    </div>
                </div><!-- .intro__content -->
            </div>
        </div><!-- .intro -->
        <div class="city-content">
            <div class="city-content__tabtitle tabs">
                <div class="container">
                    <div class="city-content__tabtitle__tablist">
                        <ul>
                            <li class="{{isActiveMenu('city_detail')}}"><a href="{{route('city_detail', $city->slug)}}" title="{{$city->name}}">{{$city->name}}</a></li>
                            @foreach($categories as $cat)
                                <li class="{{isActive($cat->slug, $cat_slug)}}"><a href="{{route('city_category_detail', [$city->slug, $cat->slug])}}" title="{{$cat->name}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- .city-content__tabtitle__tablist -->
                    <a class="city-content__tabtitle__button btn btn-mapsview" title="{{__('Maps view')}}" href="?view=map">
                        <i class="la la-map-marked-alt la-24"></i>
                        {{__('Maps view')}}
                    </a><!-- .city-content__tabtitle__button -->
                </div>
            </div><!-- .city-content__tabtitle -->
            <div class="city-content__panels">
                <div class="container">

                    @if(isRoute('city_detail'))
                        <div class="city-content__panel" id="inspire">
                            @foreach($features as $feature)
                                <div class="city-content__item">
                                    <h2 class="title title--more">
                                        {{$feature['feature_title'] ? $feature['feature_title'] : $feature['category_name']}}
                                        <a title="{{__('See all')}}" href="{{route('city_category_detail', [$city->slug, $feature['category_slug']])}}">{{__('See all')}} ({{count($feature['places'])}})</a>
                                    </h2>
                                    @if(count($feature['places']))
                                        <div class="city-slider">
                                            <div class="city-slider__grid">
                                                @foreach($feature['places'] as $place)
                                                    @include('frontend.common.place_item')
                                                @endforeach
                                            </div><!-- .city-slider__grid -->
                                            <div class="city-slider__nav slick-nav">
                                                <div class="city-slider__prev slick-nav__prev">
                                                    <i class="la la-arrow-left la-24"></i>
                                                </div><!-- .city-slider__prev -->
                                                <div class="city-slider__next slick-nav__next">
                                                    <i class="la la-arrow-right la-24"></i>
                                                </div><!-- .city-slider__next -->
                                            </div><!-- .city-slider__nav -->
                                        </div><!-- .city-slider -->
                                    @else
                                        {{__('No places')}}
                                    @endif
                                </div><!-- .city-content__item -->
                            @endforeach
                        </div><!-- .city-content__panel -->
                    @else
                        <div class="city-content__panel">
                            <div class="shop__meta">
                                <h2 class="title title--result">{{$places_by_category['category']['name']}} <span>({{$places_by_category['places']->total()}} {{__('results')}})</span></h2>
                                <div class="shop__order site__order golo-nav-filter">
                                    <div class="golo-clear-filter">
                                        <i class="la la-times"></i>
                                        <span>{{__('Clear All')}}</span>
                                    </div>
                                    <div class="shop__filter site__filter">
                                        <a title="Filter" class="golo-filter-toggle" href="#">
                                            {{__('Filter')}}
                                            <i class="la la-angle-down"></i>
                                        </a>
                                    </div><!-- .shop__filter -->
                                </div><!-- .shop__order -->
                            </div><!-- .shop__meta -->

                            <div class="golo-menu-filter">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="entry-filter">
                                            <h4>{{__('Sort By')}}</h4>
                                            <ul class="sort-by filter-control custom-scrollbar">
                                                <li><a href="#" data-sort="newest">{{__('Newest')}}</a></li>
                                                <li><a href="#" data-sort="rating">{{__('Average rating')}}</a></li>
                                                <li class="price-filter"><a href="#" data-sort="price_asc">{{__('Price: Low to high')}}</a></li>
                                                <li class="price-filter"><a href="#" data-sort="price_desc">{{__('Price: High to low')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="entry-filter">
                                            <h4>{{__('Price Filter')}}</h4>
                                            <ul class="price filter-control custom-scrollbar">
                                                <li><a href="#" data-price="0">{{__('Free')}}</a></li>
                                                <li><a href="#" data-price="1">{{__('Low: $')}}</a></li>
                                                <li><a href="#" data-price="2">{{__('Medium: $$')}}</a></li>
                                                <li><a href="#" data-price="3">{{__('High: $$$')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="entry-filter">
                                            <h4>{{__('Types')}}</h4>
                                            <ul class="type filter-control custom-scrollbar">
                                                @foreach($place_types as $type)
                                                    <li>
                                                        <input type="checkbox" class="custom-checkbox input-control" id="type_{{$type->id}}" name="types" value="{{$type->id}}">
                                                        <label for="type_{{$type->id}}">{{$type->name}}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="entry-filter">
                                            <h4>{{__('Amenities')}}</h4>
                                            <ul class="amenities filter-control custom-scrollbar">
                                                @foreach($amenities as $item)
                                                    <li>
                                                        <input type="checkbox" class="custom-checkbox input-control" id="amenities_{{$item->id}}" name="amenities" value="{{$item->id}}">
                                                        <label for="amenities_{{$item->id}}">{{$item->name}}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="city_id" value="{{$city->id}}">
                                <input type="hidden" name="category_id" value="{{$places_by_category['category']['id']}}">
                            </div>

                            <div class="city-grid">
                                <div class="row" id="list_places">
                                    @if(count($places_by_category['places']))
                                        @foreach($places_by_category['places'] as $place)
                                            <div class="col-xl-3 col-lg-4 col-6">
                                                @include('frontend.common.place_item')
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-12 text-center">
                                            {{__('No places')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="pagination">
                                    {{$places_by_category['places']->render('frontend.common.pagination')}}
                                </div><!-- .pagination -->
                            </div><!-- .city__grid -->
                        </div><!-- .city-content__panel -->
                    @endif

                </div>
            </div><!-- .city-content__panel -->
        </div><!-- .city-content -->

        <div class="other-city banner-dark">
            <div class="container">
                <h2 class="title title--while">{{__('Explorer Other Cities')}}</h2>
                <div class="other-city__content">
                    <div class="row">
                        @if(count($other_cities))
                            @foreach($other_cities as $city)
                                <div class="col-lg-3 col-md-6">
                                    <div class="cities__item hover__box">
                                        <div class="cities__thumb hover__box__thumb">
                                            <a href="{{route('city_detail', $city->slug)}}" title="{{$city->name}}">
                                                <img src="{{getImageUrl($city->thumb)}}" alt="newyork">
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
                        @else
                            <div class="col-md-12">
                                {{__('No cities')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- .other-city -->
    </main><!-- .site-main -->
@stop

@push('scripts')
    <script src="{{asset('assets/js/page_city_detail.js')}}"></script>
@endpush
