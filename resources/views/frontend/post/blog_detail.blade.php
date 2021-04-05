@extends('frontend.layouts.template')
@section('main')
    <main id="main" class="site-main">
        <div class="blog-banner">
            <img src="{{getImageUrl($post->thumb)}}" alt="{{$post->title}}">
            <div class="icon-share">
                <a title="Share" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="24" viewBox="0 0 27 24">
                        <path fill="#FFF" fill-rule="nonzero" d="M26.256 11.99L15.345.027v7.138h-2.32C5.83 7.164 0 12.996 0 20.19v3.783l1.03-1.13a18.49 18.49 0 0 1 13.658-6.025h.657v7.139L26.256 11.99z"/>
                    </svg>
                </a>
            </div><!-- .place-item__icon -->
        </div><!-- .blog-banner -->
        <div class="blog-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="blog-left">
                            <ul class="breadcrumbs">
                                @foreach($post['categories'] as $cat)
                                    <li><a href="{{route('post_list', $cat->slug)}}" title="{{$cat->name}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul><!-- .breadcrumbs -->
                            <div class="entry-content">
                                <h1>{{$post->title}}</h1>
                                <ul class="entry-meta">
                                    <li>
                                        {{__('by')}} <a title="Ben Cobb" href="#">{{$post['user']['name']}}</a>
                                    </li>
                                    <li>{{formatDate($post->created_at, 'd M Y')}}</li>
                                </ul>
                                <div class="entry-desc">
                                    {!! $post->content !!}
                                </div><!-- .entry-desc -->
                            </div><!-- .entry-content -->
                            <div class="related-post">
                                <h2>{{__('Related Articles')}}</h2>
                                <div class="related-grid columns-3">
                                    @foreach($related_posts as $related_post)
                                        <article class="hover__box post">
                                            <div class="post__thumb hover__box__thumb">
                                                <a title="{{$related_post->title}}" href="{{route('post_detail', [$related_post->slug, $related_post->id])}}"><img src="{{getImageUrl($related_post->thumb)}}" alt="{{$related_post->title}}"></a>
                                            </div>
                                            <div class="post__info">
                                                <ul class="post__category">
                                                    @foreach($post['categories'] as $cat)
                                                        <li><a href="{{route('post_list', $cat->slug)}}" title="{{$cat->name}}">{{$cat->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                                <h3 class="post__title"><a title="{{$related_post->title}}" href="{{route('post_detail', [$related_post->slug, $related_post->id])}}">{{$related_post->title}}</a></h3>
                                            </div>
                                        </article>
                                    @endforeach

                                </div>
                            </div><!-- .related-post -->
                        </div><!-- .place__left -->
                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar sidebar--shop sidebar--border">
                            <div class="widget-reservation-mini">
                                <h3>{{__('Banner Ads')}}</h3>
                                <a href="https://getgolo.com" class="open-wg btn" target="_blank">{{__('View')}}</a>
                            </div>
                            <aside class="sidebar--shop__item widget widget--ads">
                                <a title="Ads" href="https://getgolo.com" target="_blank"><img src="/assets/images/ads.png" alt=""></a>
                            </aside><!-- .sidebar--shop__item -->
                        </div><!-- .sidebar -->
                    </div>
                </div>
            </div>
        </div><!-- .blog-content -->
    </main><!-- .site-main -->
@stop