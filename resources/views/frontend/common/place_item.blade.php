<div class="places-item hover__box">
    <div class="places-item__thumb hover__box__thumb">
        <a title="{{$place->name}}" href="{{route('place_detail', $place->slug)}}"><img src="{{getImageUrl($place->thumb)}}" alt="{{$place->name}}"></a>
    </div>
    <a href="#" class="place-item__addwishlist @if($place->wish_list_count) remove_wishlist active @else @guest open-login @else add_wishlist @endguest @endif" data-id="{{$place->id}}" title="Add Wishlist">
        <i class="la la-bookmark la-24"></i>
    </a>
    <div class="places-item__info">
        <div class="places-item__category">
            @foreach($place['place_types'] as $type)
                <a href="#" title="{{$type->name}}">{{$type->name}}</a>
            @endforeach
        </div>
        <h3><a href="{{route('place_detail', $place->slug)}}" title="{{$place->name}}">{{$place->name}}</a></h3>
        <div class="places-item__meta">
            <div class="places-item__reviews">
                <span class="places-item__number">
                    @if($place->reviews_count)
                        {{number_format($place->avgReview, 1)}}
                        <i class="la la-star"></i>
                    @endif
                    <span class="places-item__count">({{$place->reviews_count}} {{__('reviews')}})</span>
                </span>
            </div>
            <div class="places-item__currency">
                {{PRICE_RANGE[$place['price_range']]}}
            </div>
        </div>
    </div>
</div>
