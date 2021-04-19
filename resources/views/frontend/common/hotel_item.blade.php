<div style="width: 100%; display: inline-block;">
    <div class="special-box p-0">
        <div class="special-img">
            <a href="#" class="bg-size blur-up lazyloaded" style=" background-size: cover; background-position: center center; background-repeat: no-repeat; display: block;" tabindex="0">
            <img src="{{asset('uploads/' . $item->thumb)}}" class="img-fluid blur-up lazyload bg-img" alt="" >
            </a>
            <div class="top-icon">
                <a href="#" class="" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist" tabindex="0">
                <i class="far fa-heart"></i>
                </a>
            </div>
        </div>
        <div class="special-content">
            <a href="#" tabindex="0">
                <h5>{{$item->name}} 
                </h5>
                <span class="my-2 d-flex align-items-center"><i class="fas fa-map-marker-alt mr-2"></i> {{$item->address}}</span>
            </a>
            <p>
                {{$item->short_description}}
            </p>
            <div class="bottom-section">
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <span>26412 review</span>
                </div>
                <div class="price">
                    @if($item->promotion_price < $item->price)
                    <del>${{$item->price}}</del>
                    <span>${{$item->promotion_price}} </span>
                    @else 
                    <span>${{$item->price}} </span>

                    @endif 
                    
                
                </div>
                <div class="facility-detail">
                    @foreach($item->amenlities as $amenlity)

                    <span>{{$amenlity['name']}}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>