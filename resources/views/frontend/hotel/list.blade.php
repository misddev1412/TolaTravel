@extends('frontend.layouts.template')
@push('style')
<link rel="stylesheet" href="{{asset('assets/css/hotel.css')}}">
@endpush
@section('main')
    <main id="main" class="site-main">
        <section class="pt-0 xs-section bg-inner">
            <div class="container container__hotel ">
                <div class="row">
                    <div class="sidebar-overlay" onclick="hideFilterHotel()"></div>
                    <div class="col-lg-3">
                        <div class="left-sidebar">
                            <div class="back-btn">
                                back
                            </div>
                            <div class="search-bar">
                                <input type="text" placeholder="Search here..">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="middle-part collection-collapse-block open">
                                <a href="javascript:void(0)" class="section-title collapse-block-title d-flex justify-content-between">
                                    <h5>latest filter</h5>
                                    <i class="las la-filter"></i>
                                </a>
                                <div class="collection-collapse-block-content ">
                                    <div class="filter-block">
                                        <div class="collection-collapse-block open">
                                            <h6 class="collapse-block-title">district</h6>
                                            <div class="collection-collapse-block-content">
                                                <div class="collection-brand-filter">
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="zara">
                                                        <label class="form-check-label" for="zara">all</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="vera-moda">
                                                        <label class="form-check-label" for="vera-moda">la
                                                        defance</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="forever-21">
                                                        <label class="form-check-label" for="forever-21">paris
                                                        center</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="roadster">
                                                        <label class="form-check-label" for="roadster">latin</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-block">
                                        <div class="collection-collapse-block open">
                                            <h6 class="collapse-block-title">facility</h6>
                                            <div class="collection-collapse-block-content">
                                                <div class="collection-brand-filter">
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="restaurant">
                                                        <label class="form-check-label" for="restaurant">restaurant</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="wifi">
                                                        <label class="form-check-label" for="wifi">wifi</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="spa">
                                                        <label class="form-check-label" for="spa">spa &amp; salon</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="pet">
                                                        <label class="form-check-label" for="pet">pet allowed</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="parking">
                                                        <label class="form-check-label" for="parking">parking</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="swimming">
                                                        <label class="form-check-label" for="swimming">swimming
                                                        pool</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="fitness">
                                                        <label class="form-check-label" for="fitness">fitness
                                                        center</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-block">
                                        <div class="collection-collapse-block open">
                                            <h6 class="collapse-block-title">star category</h6>
                                            <div class="collection-collapse-block-content">
                                                <div class="collection-brand-filter">
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="five">
                                                        <label class="form-check-label rating" for="five">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span class="ms-1">(4025)</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="four">
                                                        <label class="form-check-label rating" for="four">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <span class="ms-1">(2012)</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="three">
                                                        <label class="form-check-label rating" for="three">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <span class="ms-1">(25)</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="two">
                                                        <label class="form-check-label rating" for="two">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <span class="ms-1">(1)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-block">
                                        <div class="collection-collapse-block open">
                                            <h6 class="collapse-block-title">price range</h6>
                                            <div class="collection-collapse-block-content">
                                                <div class="wrapper">
                                                    <div class="range-slider">
                                                        <span class="irs js-irs-0"><span class="irs"><span class="irs-line" tabindex="-1"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min" style="visibility: hidden;">$0</span><span class="irs-max" style="visibility: hidden;">$1.500</span><span class="irs-from" style="visibility: visible; left: 0%;">$0</span><span class="irs-to" style="visibility: visible; left: 82.9281%;">$1.500</span><span class="irs-single" style="visibility: hidden; left: 35.7507%;">$0 - $1.500</span></span><span class="irs-grid"></span><span class="irs-bar" style="left: 1.51803%; width: 96.9639%;"></span><span class="irs-shadow shadow-from" style="display: none;"></span><span class="irs-shadow shadow-to" style="display: none;"></span><span class="irs-slider from" style="left: 0%;"></span><span class="irs-slider to" style="left: 96.9639%;"></span></span><input type="text" class="js-range-slider irs-hidden-input" value="" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-block">
                                        <div class="collection-collapse-block open">
                                            <h6 class="collapse-block-title">host language</h6>
                                            <div class="collection-collapse-block-content">
                                                <div class="collection-brand-filter">
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="english">
                                                        <label class="form-check-label" for="english">english</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="sign">
                                                        <label class="form-check-label" for="sign">sign language</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="italiano">
                                                        <label class="form-check-label" for="italiano">italiano</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="suomi">
                                                        <label class="form-check-label" for="suomi">suomi</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="espanol">
                                                        <label class="form-check-label" for="espanol">espanol</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="french">
                                                        <label class="form-check-label" for="french">french</label>
                                                    </div>
                                                    <div class="form-check collection-filter-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="arabic">
                                                        <label class="form-check-label" for="arabic">arabic</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-9 ratio3_2">
                        <a href="javascript:void(0)" class="mobile-filter mt-3" onclick="showFilterHotel()">
                            <h5>latest filter</h5>
                            <i class="las la-filter"></i>
                        </a>
                        <div class="list-view content" >
                            @foreach($hotels as $item)
                                <div class="list-box col-12 popular grid-item wow fadeInUp" >
                                    <div class="list-img">
                                        <a href="{{route('hotel_detail', ['country_slug' => $country_slug, 'slug' => $item->slug])}}">
                                        <img src="{{asset('uploads/' . $item->thumb)}}" class="img-fluid blur-up lazyloaded" alt="">
                                        </a>
                                    </div>
                                    <div class="list-content">
                                        <div>
                                            <a href="{{route('hotel_detail', ['country_slug' => $country_slug, 'slug' => $item->slug])}}">
                                                <h5>{{$item->name}}</h5>
                                            </a>
                                            <p>{{$item->address}}</p>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>26412 review</span>
                                            </div>
                                            <div class="facility-icon">
                                                @foreach($item->amenlities as $amenlity)
                                           
                                                <div class="facility-box">
                                                    <img src="{{asset('uploads/' . $amenlity['icon'])}}" class="img-fluid blur-up lazyloaded" alt="">
                                                    <span>{{$amenlity['name']}}</span>
                                                </div>
                                                @endforeach
                                              
                                            </div>
                                            <div class="price">
                                                @if($item->promotion_price < $item->price)
                                                <del>${{$item->price}}</del>
                                                ${{$item->promotion_price}} <span>/ per night</span>
                                                @else 
                                                ${{$item->price}} <span>/ per night</span>

                                                @endif 
                                                <p class="mb-0">login &amp; unlock a secret deal</p>
                                            </div>
                                            {{-- <div class="offer-box">
                                                <i class="fas fa-fire"></i> 8 people booked this hotel today
                                            </div> --}}
                                            <a href="{{route('hotel_detail', ['country_slug' => $country_slug, 'slug' => $item->slug])}}" class="btn btn-solid color1 book-now">book now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <nav aria-label="Page navigation example" class="pagination-section">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                </div>
                </div>
            </div>
        </section>
    </main><!-- .site-main -->
@stop