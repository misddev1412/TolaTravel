<div class="slick-item">
    <div class="cities__item hover__box">
        <div class="cities__thumb hover__box__thumb">
            <a title="London" href="{{route('page_search_listing', ['city[]' => $city->id])}}">
                <img src="{{getImageUrl($city->thumb)}}" alt="{{$city->name}}">
            </a>
        </div>
        <h4 class="cities__name">{{$city['country']['name']}}</h4>
        <div class="cities__info">
            <h3 class="cities__capital">{{$city->name}}</h3>
            <p class="cities__number">{{$city->places_count}} {{__('places')}}</p>
        </div>
    </div><!-- .cities__item -->
</div>