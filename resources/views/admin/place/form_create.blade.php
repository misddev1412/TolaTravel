<form action="{{route('admin_place_create')}}" enctype="multipart/form-data" method="post">
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
                            <div class="tab-pane fade show {{$index !== 0 ?: "active"}}" id="language_{{$language->code}}" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group">
                                    <label for="place_name">Place name
                                        <small>({{$language->code}})</small>
                                        : *</label>
                                    <input type="text" class="form-control" name="{{$language->code}}[name]" placeholder="What the name of place" autocomplete="off" {{$index !== 0 ?: "required"}}>
                                </div>

                                <div class="form-group">
                                    <label for="place_description">Description
                                        <small>({{$language->code}})</small>
                                        : *</label>
                                    <textarea type="text" class="form-control" id="place_description" name="{{$language->code}}[description]" rows="6" {{$index !== 0 ?: "required"}}></textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="price_range">Price range: *</label>
                    <select class="form-control" id="price_range" name="price_range">
                        <option value="">None</option>
                        <option value="0">Free</option>
                        <option value="1">$</option>
                        <option value="2">$$</option>
                        <option value="3">$$$</option>
                        <option value="4">$$$$</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="place_category">Category: *</label>
                    <select class="form-control chosen-select" id="place_category" name="category[]" multiple data-live-search="true" required>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="place_type">Place type: *</label>
                    <select class="form-control chosen-select" id="place_type" name="place_type[]" multiple data-live-search="true" required>
                        @foreach($place_types as $cat)
                            <optgroup label="{{$cat->name}}">
                                @foreach($cat['place_type'] as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
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
                        <label class="p-0"><input type="checkbox" class="flat" name="amenities[]" value="{{$item->id}}"> {{$item->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="location">
            <p class="lead">Location</p>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="select_country">Country: *</label>
                    <select class="form-control" id="select_country" name="country_id" required>
                        <option value="">Select country</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="select_city">City: *</label>
                    <select class="form-control" id="select_city" name="city_id" required>
                        <option value="">Please select country first</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="place_address">Place Address: *</label>
                <input type="text" class="form-control" id="place_address" name="address" placeholder="Full Address" autocomplete="off">

                <input type="hidden" id="place_lat" name="lat">
                <input type="hidden" id="place_lng" name="lng">
            </div>

            {{--<input type="text" id="pac-input" class="form-control" placeholder="Search address..." autocomplete="off">--}}
            <div id="map"></div>

        </div>

        <div id="contact_info">
            <p class="lead">Contact info</p>
            <div class="form-group">
                <label for="place_email">Email:</label>
                <input type="text" class="form-control" id="place_email" name="email">
            </div>
            <div class="form-group">
                <label for="place_phone_number">Phone number:</label>
                <input type="text" class="form-control" id="place_phone_number" name="phone_number">
            </div>
            <div class="form-group">
                <label for="place_website">Website:</label>
                <input type="text" class="form-control" id="place_website" name="website">
            </div>
        </div>

        <div id="social_network">
            <p class="lead">Social Networks</p>
            <div id="social_list">
                <div class="row form-group social_item">
                    <div class="col-md-5">
                        <select class="form-control" name="social[0][name]">
                            @foreach(SOCIAL_LIST as $value)
                                <option value="{{$value['name']}}">{{$value['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="" name="social[0][url]" placeholder="Enter URL include http or www">
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-round btn-default" id="social_addmore">+ Add more</button>
        </div>

        <div id="opening_hours">
            <p class="lead">Opening hours</p>
            <div id="openinghour_list">
                @foreach(DAYS as $key => $day)
                    <div class="row form-group openinghour_item">
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="opening_hour[{{$key}}][title]" value="{{$day}}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="opening_hour[{{$key}}][value]" placeholder="enter value. Exp: 9:00 - 21:00">
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-round btn-default" id="openinghour_addmore">+ Add more</button>
        </div>

        <div id="media">
            <p class="lead">Media</p>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Thumbnail image:</strong></p>
                    <img id="preview_thumb" src="https://via.placeholder.com/120x150?text=thumbnail">
                    <input type="file" class="form-control" id="thumb" name="thumb" accept="image/*">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 gallery">
                    <p><strong>Gallery images:</strong></p>
                    <div id="place_gallery_thumbs"></div>
                </div>
                <div class="col-md-6">
                    <input type="file" class="form-control" id="gallery" accept="image/*">
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
                <label class="btn btn-secondary" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                    <input type="radio" name="booking_type" value="{{\App\Models\Booking::TYPE_BOOKING_FORM}}" class="join-btn">Booking form
                </label>
                <label class="btn btn-secondary" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                    <input type="radio" name="booking_type" value="{{\App\Models\Booking::TYPE_CONTACT_FORM}}" class="join-btn">Enquiry Form
                </label>
                <label class="btn btn-secondary" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                    <input type="radio" name="booking_type" value="{{\App\Models\Booking::TYPE_AFFILIATE}}" class="join-btn">Affiliate Book Buttons
                </label>
                <label class="btn btn-secondary" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                    <input type="radio" name="booking_type" value="{{\App\Models\Booking::TYPE_BANNER}}" class="join-btn">Affiliate Banner Ads
                </label>
            </div>

            <div id="booking_affiliate_link" style="display: none;">
                <p class="lead">Affiliate Book Buttons</p>
                <div class="form-group">
                    <label for="name">booking.com:</label>
                    <input type="text" class="form-control" id="" name="link_bookingcom" placeholder="Enter url booking">
                </div>
            </div>
        </div>

        <div class="ln_solid"></div>

        <div id="golo_seo">
            <p class="lead">Golo SEO</p>

            <div class="form-group">
                <label for="seo_title">SEO title:</label>
                <input type="text" class="form-control" id="seo_title" name="seo_title">
            </div>
            <div class="form-group">
                <label for="seo_description">Meta Description:</label>
                <textarea class="form-control" id="seo_description" name="seo_description"></textarea>
            </div>
        </div>


    </div>

    <button type="submit" class="btn btn-primary mt-20">Submit</button>
</form>
