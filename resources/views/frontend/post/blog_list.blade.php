@extends('frontend.layouts.template')
@php
    $blog_title_bg = "style='background-image:url(/assets/images/img-bg-blog.png)'";
@endphp
@section('main')
    <main id="main" class="site-main">
        <div class="page-title page-title--small page-title--blog align-left" {!! $blog_title_bg !!}>
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">
                        @if($category)
                            {{$category->name}}
                        @else
                            {{__('Blog')}}
                        @endif
                    </h1>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="page-content isotope">
            <div class="container">
                <div class="isotope__nav">
                    <ul>
                        <li><a class="{{!isRoute('post_list_all')?: 'active'}}" href="{{route('post_list_all')}}" title="All"><span class="entry-name">{{__('All')}}</span> <span class="count">({{$post_total}})</span></a></li>
                        @foreach($categories as $cat)
                            <li><a class="{{isActive($cat_slug, $cat->slug)}}" href="{{route('post_list', $cat->slug)}}" title="{{$cat->name}}"><span class="entry-name">{{$cat->name}}</span> <span class="count">({{$cat->post_count}})</span></a></li>
                        @endforeach
                    </ul>
                </div><!-- .isotope__nav -->

                <div class="post-grid columns-3">
                    @foreach($posts as $post)
                        <article class="hover__box isotope__grid__item post">
                            <div class="post__thumb hover__box__thumb">
                                <a title="{{$post->title}}" href="{{route('post_detail', [$post->slug, $post->id])}}"><img src="{{getImageUrl($post->thumb)}}" alt="{{$post->title}}"></a>
                            </div>
                            <div class="post__info">
                                <ul class="post__category">
                                    @foreach($post['categories'] as $cat)
                                        <li><a href="{{route('post_list', $cat->slug)}}" title="{{$cat->name}}">{{$cat->name}}</a></li>
                                    @endforeach
                                </ul>
                                <h3 class="post__title"><a title="{{$post->title}}" href="{{route('post_detail', [$post->slug, $post->id])}}">{{$post->title}}</a></h3>
                            </div>
                        </article>
                    @endforeach
                </div><!-- .isotope__grid -->

                <div class="pagination">
                    {{$posts->render('frontend.common.pagination')}}
                </div><!-- .pagination -->

            </div>
        </div>
    </main><!-- .site-main -->
@stop