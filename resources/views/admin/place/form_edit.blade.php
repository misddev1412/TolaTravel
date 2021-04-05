<form action="{{route('admin_place_create')}}" enctype="multipart/form-data" method="post">
    @method('put')
    @csrf

    <div class="tab-content">

        <ul class="nav nav-tabs bar_tabs" role="tablist">
            @foreach($languages as $index => $language)
                <li class="nav-item">
                    <a class="nav-link {{$index !== 0 ?: "active"}}" id="home-tab" data-toggle="tab" href="#language_{{$language->code}}" role="tab" aria-controls="" aria-selected="">{{$language->name}}</a>
                </li>
            @endforeach
        </ul>

        <div id="genaral">
            <p class="lead">Genaral</p>

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="tab-content">
                        @foreach($languages as $index => $language)
                            @php
                                $trans = $place ? $place->translate($language->code) : [];
                            @endphp
                            <div class="tab-pane fade show {{$index !== 0 ?: "active"}}" id="language_{{$language->code}}" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group">
                                    <label for="place_name">Place name <small>({{$language->code}})</small>: *</label>
                                    <input type="text" class="form-control" name="{{$language->code}}[name]" value="{{$trans['name']}}" placeholder="What the name of place" autocomplete="off" {{$index !== 0 ?: "required"}}>
                                </div>
                                <div class="form-group">
                                    <label for="name">Description <small>({{$language->code}})</small>: *</label>
                                    <textarea type="text" class="form-control" name="{{$language->code}}[description]" rows="6" {{$index !== 0 ?: "required"}}>{{$trans['description']}}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="name">Price range: *</label>
                    <select class="form-control" id="price_range" name="price_range" required>
                        @foreach(PRICE_RANGE as $key => $value)
                            <option value="{{$key}}" {{isSelected($key, $place->price_range)}}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Category: *</label>
                    <select class="form-control chosen-select" id="" name="category[]" multiple data-live-search="true" required>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}" {{isSelected($cat->id, $place->category)}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="name">Place type: *</label>
                    <select class="form-control chosen-select" id="" name="place_type[]" multiple data-live-search="true" required>
                        @foreach($place_types as $cat)
                            <optgroup label="{{$cat->name}}">
                                @foreach($cat['place_type'] as $type)
                                    <option value="{{$type->id}}" {{isSelected($type->id, $place->place_type)}}>{{$type->name}}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>


        <div id="hightlight">
            <p class="lead">Amenities</p>
            <div class="checkbox row">
                @foreach($amenities as $item)
                    <div class="col-md-3 mb-10">
                        <label class="p-0"><input type="checkbox" class="flat" name="amenities[]" value="{{$item->id}}" {{isChecked($item->id, $place->amenities)}}> {{$item->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="location">
            <p class="lead">Location</p>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="place_address">Country: *</label>
                    <select class="form-control" id="select_country" name="country_id" required>
                        <option value="">Select country</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}" {{isSelected($country->id, $place->country_id)}}>{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="place_address">City: *</label>
                    <select class="form-control" id="select_city" name="city_id" required>
                        <option value="">Please select country first</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" {{isSelected($city->id, $place->city_id)}}>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="place_address">Place Address: *</label>
                <input type="text" class="form-control" id="place_address" name="address" value="{{$place->address}}" placeholder="Full Address" autocomplete="off" required>

                <input type="hidden" id="place_lat" name="lat" value="{{$place->lat}}">
                <input type="hidden" id="place_lng" name="lng" value="{{$place->lng}}">
            </div>

            {{--<input type="text" id="pac-input" class="form-control" value="{{$place->address}}" placeholder="Search address..." autocomplete="off">--}}
            <div id="map"></div>
        </div>

        <div id="contact_info">
            <p class="lead">Contact info</p>

            <div class="form-group">
                <label for="name">Email:</label>
                <input type="text" class="form-control" id="place_email" name="email" value="{{$place->email}}" placeholder="Enter email address">
            </div>
            <div class="form-group">
                <label for="name">Phone number:</label>
                <input type="text" class="form-control" id="place_phone_number" name="phone_number" value="{{$place->phone_number}}" placeholder="Enter phone number">
            </div>
            <div class="form-group">
                <label for="name">Website:</label>
                <input type="text" class="form-control" id="place_website" name="website" value="{{$place->website}}" placeholder="Enter website url">
            </div>
        </div>

        <div id="social_network">
            <p class="lead">Social Networks</p>

            <div id="social_list">
                @if($place->social)
                    @foreach($place->social as $index => $social)
                        <div class="row form-group social_item" id="social_item_{{$index}}">
                            <div class="col-md-5">
                                <select class="form-control" name="social[{{$index}}][name]">
                                    @foreach(SOCIAL_LIST as $value)
                                        <option value="{{$value['name']}}" {{isSelected($value['name'], $social['name'])}}>{{$value['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="social[{{$index}}][url]" value="{{$social['url']}}">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger social_item_remove" id="{{$index}}">X</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <button type="button" class="btn btn-round btn-default" id="social_addmore">+ Add more</button>
        </div>

        <div id="opening_hours">
            <p class="lead">Opening hours</p>

            <div id="openinghour_list">
                @if($place->opening_hour)
                    @foreach($place->opening_hour as $index => $opening_hour)
                        <div class="row form-group openinghour_item">
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="" name="opening_hour[{{$index}}][title]" value="{{$opening_hour['title']}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="" name="opening_hour[{{$index}}][value]" value="{{$opening_hour['value']}}">
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <input type="hidden" name="place_id" value="{{$place->id}}">
            <button type="button" class="btn btn-round btn-default" id="openinghour_addmore">+ Add more</button>

        </div>

        <div id="media">
            <p class="lead">Media</p>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Thumbnail image:</strong></p>
                    <img id="preview_thumb" src="{{getImageUrl($place->thumb)}}" alt="">
                    <input type="file" class="form-control" id="thumb" name="thumb" accept="image/*">
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 gallery">
                    <p><strong>Gallery images:</strong></p>
                    <div id="place_gallery_thumbs">
                        @if($place->gallery)
                            @foreach($place->gallery as $image)
                                <div class="col-sm-2 media-thumb-wrap">
                                    <figure class="media-thumb">
                                        <img src="{{getImageUrl($image)}}">
                                        <div class="media-item-actions">
                                            <a class="icon icon-delete" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                                    <g fill="#5D5D5D" fill-rule="nonzero">
                                                        <path d="M14.964 2.32h-4.036V0H4.105v2.32H.07v1.387h1.37l.924 12.25H12.67l.925-12.25h1.369V2.319zm-9.471-.933H9.54v.932H5.493v-.932zm5.89 13.183H3.65L2.83 3.707h9.374l-.82 10.863z"></path>
                                                        <path d="M6.961 6.076h1.11v6.126h-1.11zM4.834 6.076h1.11v6.126h-1.11zM9.089 6.076h1.11v6.126h-1.11z"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                            <input type="hidden" name="gallery[]" value="{{$image}}">
                                            <span class="icon icon-loader d-none"><i class="fa fa-spinner fa-spin"></i></span>
                                        </div>
                                    </figure>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="file" class="form-control" id="gallery" name="banner" accept="image/*">
                </div>
            </div>

            <div class="form-group video">
                <label for="place_video">Video:</label>
                <input type="text" class="form-control" id="place_video" name="video" placeholder="Youtube, Vimeo video url">
            </div>
        </div>

        <div id="link_affiliate">
            <p class="lead">Booking type</p>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-secondary {{isActive($place->booking_type, \App\Models\Booking::TYPE_BOOKING_FORM)}}" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                    <input type="radio" class="join-btn" name="booking_type" value="{{\App\Models\Booking::TYPE_BOOKING_FORM}}" {{isChecked($place->booking_type, \App\Models\Booking::TYPE_BOOKING_FORM)}}>Booking Form
                </label>
                <label class="btn btn-secondary {{isActive($place->booking_type, \App\Models\Booking::TYPE_CONTACT_FORM)}}" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                    <input type="radio" class="join-btn" name="booking_type" value="{{\App\Models\Booking::TYPE_CONTACT_FORM}}" {{isChecked($place->booking_type, \App\Models\Booking::TYPE_CONTACT_FORM)}}>Contact Form
                </label>
                <label class="btn btn-secondary {{isActive($place->booking_type, \App\Models\Booking::TYPE_AFFILIATE)}}" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                    <input type="radio" class="join-btn" name="booking_type" value="{{\App\Models\Booking::TYPE_AFFILIATE}}" {{isChecked($place->booking_type, \App\Models\Booking::TYPE_AFFILIATE)}}>Booking Affiliate Link
                </label>
                <label class="btn btn-secondary" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                    <input type="radio" name="booking_type" value="{{\App\Models\Booking::TYPE_BANNER}}" class="join-btn">Banner Link
                </label>
            </div>

            <div id="booking_affiliate_link" style="display: none;">
                <p class="lead">Link Affiliate booking</p>
                <div class="form-group">
                    <label for="name">booking.com:</label>
                    <input type="text" class="form-control" id="" name="link_bookingcom" placeholder="Enter url booking" value="{{$place->link_bookingcom}}">
                </div>
            </div>
            @if($place->booking_type === \App\Models\Booking::TYPE_AFFILIATE)
                @push('scripts')
                    <script>
                        $('#booking_affiliate_link').show();
                    </script>
                @endpush
            @endif
        </div>

        <div class="ln_solid"></div>

        <div id="golo_seo">
            <p class="lead">Golo SEO</p>

            <div class="form-group">
                <label for="seo_title">SEO title:</label>
                <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{$place['seo_title']}}">
            </div>
            <div class="form-group">
                <label for="seo_description">Meta Description:</label>
                <textarea class="form-control" id="seo_description" name="seo_description">{{$place['seo_description']}}</textarea>
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-20">Update</button>
</form>
