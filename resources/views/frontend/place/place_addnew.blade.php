@extends('frontend.layouts.template')
@section('main')
    <main id="main" class="site-main listing-main">
        <div class="listing-nav">
            <div class="listing-menu nav-scroll">
                <ul>
                    <li class="active">
                        <a href="#genaral" title="Genaral">
                            <span class="icon"><i class="la la-cog"></i></span>
                            <span>{{__('Genaral')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#amenities" title="Amenities">
                            <span class="icon"><i class="la la-wifi"></i></span>
                            <span>{{__('Amenities')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#location" title="Location">
                            <span class="icon"><i class="la la-map-marker"></i></span>
                            <span>{{__('Location')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#contact" title="Contact info">
                            <span class="icon"><i class="la la-phone"></i></span>
                            <span>{{__('Contact info')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#social" title="Social network">
                            <span class="icon"><i class="la la-link"></i></span>
                            <span>{{__('Social network')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#open" title="Open hourses">
                            <span class="icon"><i class="la la-business-time"></i></span>
                            <span>{{__('Open hours')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#media" title="Media">
                            <span class="icon"><i class="la la-image"></i></span>
                            <span>{{__('Media')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div><!-- .listing-nav -->

        <div class="listing-content">
            <h2>
                @if(isRoute('place_edit'))
                    {{__('Edit my place')}}
                @else
                    {{__('Add new place')}}
                @endif
            </h2>
            <form class="upload-form" id="new_place" action="{{route('place_create')}}" method="POST" enctype="multipart/form-data">
                @if(isRoute('place_edit'))
                    @method('PUT')
                @endif
                @csrf
                <div class="listing-box" id="genaral">
                    <h3>{{__('Genaral')}}</h3>
                    <div class="field-inline">
                        <div class="field-group field-input">
                            <label for="place_name">{{__('Place Name')}} ({{$language_default['code']}}) *</label>
                            <input type="text" id="place_name" name="{{$language_default['code']}}[name]" value="{{$place['name']}}" required placeholder="{{__('What the name of place')}}">
                        </div>
                        <div class="field-group field-select">
                            <label for="price_range">{{__('Price Range')}}</label>
                            <select id="price_range" name="price_range">
                                @foreach(PRICE_RANGE as $key => $price)
                                    <option value="{{$key}}" {{isSelected($key, $place['price_range'])}}>{{$price}}</option>
                                @endforeach
                            </select>
                            <i class="la la-angle-down"></i>
                        </div>
                    </div>
                    <div class="field-group">
                        <label for="description">{{__('Description')}} ({{$language_default['code']}}) *</label>
                        <textarea class="form-control" id="description" name="{{$language_default['code']}}[description]" rows="5">{{$place['description']}}</textarea>
                    </div>
                    <div class="field-group field-select">
                        <label for="lis_category">{{__('Category')}} *</label>
                        <select class="chosen-select" id="lis_category" name="category[]" data-placeholder="{{__('Select Category')}}" multiple required>
                            @foreach($categories as $cat)
                                <option value="{{$cat['id']}}" {{isSelected($cat['id'], $place['category'])}}>{{$cat['name']}}</option>
                            @endforeach
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>
                    <div class="field-group field-select">
                        <label for="lis_place_type">{{__('Place Type')}} *</label>
                        <select class="chosen-select" id="lis_place_type" name="place_type[]" data-placeholder="{{__('Select Place Type')}}" multiple required>
                            @foreach($place_types as $cat)
                                <optgroup label="{{$cat['name']}}">
                                    @foreach($cat['place_type'] as $type)
                                        <option value="{{$type['id']}}" {{isSelected($type['id'], $place['place_type'])}}>{{$type['name']}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="amenities">
                    <h3>{{__('Amenities')}}</h3>
                    <div class="field-group field-check">
                        @foreach($amenities as $item)
                            <label for="amenities_{{$item['id']}}">
                                <input type="checkbox" name="amenities[]" id="amenities_{{$item['id']}}" value="{{$item['id']}}" {{isChecked($item['id'], $place['amenities'])}}>{{$item['name']}}
                                <span class="checkmark">
                                    <i class="la la-check"></i>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="location">
                    <h3>{{__('Location')}}</h3>
                    <label for="place_address">{{__('Place Address')}} *</label>
                    <div class="field-clone">
                        <div class="field-inline field-3col">
                            <div class="field-group field-select">
                                <select name="country_id" class="custom-select" id="select_country" required>
                                    <option value="">{{__('Select country')}}</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country['id']}}" {{isSelected($country['id'], $place['country_id'])}}>{{$country['name']}}</option>
                                    @endforeach
                                </select>
                                <i class="la la-angle-down"></i>
                            </div>
                            <div class="field-group field-select">
                                <select name="city_id" class="custom-select" id="select_city" required>
                                    <option value="">{{__('Select city')}}</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city['id']}}" {{isSelected($city['id'], $place['city_id'])}}>{{$city['name']}}</option>
                                    @endforeach
                                </select>
                                <i class="la la-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field-group">
                        <input type="text" id="pac-input" placeholder="{{__('Full Address')}}" value="{{$place['address']}}" name="address" autocomplete="off" required/>
                    </div>
                    <div class="field-group field-maps">
                        <div class="field-inline">
                            <label for="pac-input">{{__('Place Location at Google Map')}}</label>
                        </div>
                        <div class="field-map">
                            <input type="hidden" id="place_lat" name="lat" value="{{$place['lat']}}">
                            <input type="hidden" id="place_lng" name="lng" value="{{$place['lng']}}">
                            <div id="map"></div>
                        </div>
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="contact">
                    <h3>Contact Info</h3>
                    <div class="field-group">
                        <label for="place_email">{{__('Email')}}</label>
                        <input type="email" id="place_email" value="{{$place['email']}}" placeholder="{{__('Your email address')}}" name="email">
                    </div>
                    <div class="field-group">
                        <label for="place_number">{{__('Phone number')}}</label>
                        <input type="tel" id="place_number" value="{{$place['phone_number']}}" placeholder="{{__('Your phone number')}}" name="phone_number">
                    </div>
                    <div class="field-group">
                        <label for="place_website">{{__('Website')}}</label>
                        <input type="text" id="place_website" value="{{$place['website']}}" placeholder="{{__('Your website url')}}" name="website">
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="social">
                    <h3>{{__('Social Networks')}}</h3>
                    <div class="field-group">
                        <label for="place_socials">{{__('Social Networks')}}</label>

                        <div class="social_list">
                            @if($place)
                                @foreach($place['social'] as $key => $social)
                                    <div class="field-inline field-3col social_item">
                                        <div class="field-group field-select">
                                            <select name="social[{{$key}}][name]" id="place_socials">
                                                <option value="">{{__('Select network')}}</option>
                                                @foreach(SOCIAL_LIST as $k => $value)
                                                    <option value="{{$k}}" {{isSelected($k, $social['name'])}}>{{$value['name']}}</option>
                                                @endforeach
                                            </select>
                                            <i class="la la-angle-down"></i>
                                        </div>
                                        <div class="field-group field-input">
                                            <input type="text" name="social[{{$key}}][url]" value="{{$social['url']}}" placeholder="{{__('Enter URL include http or www')}}">
                                        </div>
                                        <a href="#" class="social_item_remove pt-2">
                                            <i class="la la-trash-alt"></i>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="field-inline field-3col social_item">
                                    <div class="field-group field-select">
                                        <select name="social[0][name]" id="place_socials">
                                            <option value="">{{__('Select network')}}</option>
                                            @foreach(SOCIAL_LIST as $value)
                                                <option value="{{$value['name']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                        <i class="la la-angle-down"></i>
                                    </div>
                                    <div class="field-group field-input">
                                        <input type="text" name="social[0][url]" placeholder="{{__('Enter URL include http or www')}}">
                                    </div>
                                    <a href="#" class="social_item_remove pt-2">
                                        <i class="la la-trash-alt"></i>
                                    </a>
                                </div>
                            @endif
                        </div>

                        <a href="#social" id="social_addmore" class="add-social btn">
                            <i class="la la-plus la-24"></i>
                            <span>{{__('Add more')}}</span>
                        </a>
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="open">
                    <h3>{{__('Opening Hours')}}</h3>
                    <div class="group-field" id="time-opening">
                        @if($place)
                            @foreach($place['opening_hour'] as $index => $opening_hour)
                                <div class="field-inline field-3col openinghour_item">
                                    <div class="field-group field-input">
                                        <input type="text" class="form-control valid" name="opening_hour[{{$index}}][title]" value="{{$opening_hour['title']}}">
                                    </div>
                                    <div class="field-group field-input">
                                        <input type="text" class="form-control" name="opening_hour[{{$index}}][value]" value="{{$opening_hour['value']}}">
                                    </div>
                                    <a href="#" class="openinghour_item_remove pt-2">
                                        <i class="la la-trash-alt"></i>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            @foreach(DAYS as $key => $value)
                                <div class="place-fields-wrap">
                                    <div class="place-fields place-time-opening row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control valid" name="opening_hour[{{$key}}][title]" value="{{$value}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="opening_hour[{{$key}}][value]" placeholder="{{$value == "Ex: Sunday" ? "Closed" : "Ex: 9:00 AM - 5:00 PM"}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <a href="#open" class="add-social btn" id="openinghour_addmore">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <g fill="#2D2D2D" fill-rule="evenodd">
                                <path d="M7 0h2v16H7z"/>
                                <path d="M16 7v2H0V7z"/>
                            </g>
                        </svg>
                        <span>{{__('Add more')}}</span>
                    </a>
                </div><!-- .listing-box -->
                <div class="listing-box" id="media">
                    <h3>Media</h3>
                    <div class="field-group field-file">
                        <label for="thumb_image">{{__('Thumb image')}}</label>
                        <label for="thumb_image" class="preview">
                            @if($place && $place['thumb'])
                                <input type="file" id="thumb_image" name="thumb" class="upload-file">
                            @else
                                <input type="file" id="thumb_image" name="thumb" class="upload-file" required>
                            @endif
                            <img id="thumb_preview" src="{{$place && $place['thumb'] ? getImageUrl($place['thumb']) : ''}}" alt=""/>
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        <div class="field-note">{{__('Maximum file size: 1 MB')}}.</div>
                    </div>
                    <div class="field-group field-file">
                        <label for="gallery_img">{{__('Gallery Images')}}</label>
                        <div id="gallery_preview">
                            @if($place && $place['gallery'])
                                @foreach($place['gallery'] as $gallery)
                                    <div class="col-sm-2 media-thumb-wrap">
                                        <figure class="media-thumb">
                                            <img src="{{getImageUrl($gallery)}}">
                                            <div class="media-item-actions">
                                                <a class="icon icon-delete" href="#">
                                                    <i class="la la-trash-alt"></i>
                                                </a>
                                                <input type="hidden" name="gallery[]" value="{{$gallery}}">
                                                <span class="icon icon-loader"><i class="fa fa-spinner fa-spin"></i></span>
                                            </div>
                                        </figure>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <label for="gallery" class="preview w-100">
                            <input type="file" id="gallery" class="upload-file">
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        <div class="field-note">{{__('Maximum file size: 1 MB')}}.</div>
                    </div>
                    <div class="field-group">
                        <label for="place_video">{{__('Video')}}</label>
                        <input type="text" id="place_video" name="video" placeholder="{{__('Youtube, Vimeo video url')}}">
                    </div>
                </div><!-- .listing-box -->

                <div class="field-group field-submit">
                    <input type="hidden" name="place_id" value="{{$place['id']}}">
                    @guest
                        <a href="#" class="btn btn-login open-login">{{__('Login to submit')}}</a>
                    @else
                        @if(isRoute('place_edit'))
                            <input class="btn" type="submit" value="{{__('Update')}}">
                        @else
                            <input class="btn" type="submit" value="{{__('Submit')}}">
                        @endif
                    @endguest
                </div>

            </form>
        </div><!-- .listing-content -->
    </main><!-- .site-main -->
@stop

@push('scripts')
    <script src="{{asset('assets/js/page_place_new.js')}}"></script>
@endpush