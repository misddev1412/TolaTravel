var GL_Map_View = GL_Map_View || {};
var map_refresh = true;

// (function ($) {
//     "use strict";

    GL_Map_View = {
        init: function () {
            GL_Map_View.clickShowMap();
            GL_Map_View.clickHideMap();
            GL_Map_View.mapFilter();
        },

        clickShowMap: function () {
            $(document).on('click', '.btn-mapsview', function (e) {
                e.preventDefault();
                $('html, body').animate({scrollTop: 0}, 300);
                $('body').css('overflow', 'hidden');
                $('.maps-wrap').fadeIn(500);
                if (map_refresh) {
                    GL_Map_View.searchMap();
                }
            });
        },

        clickHideMap: function () {
            $(document).on('click', '#mapview_close', function (e) {
                e.preventDefault();
                $('body').css('overflow', 'auto');
                $('.maps-wrap').fadeOut(500);
                map_refresh = false;
            });
        },

        mapFilter: function () {
            $(document).on('change', '.map_filter', function (e) {
                GL_Map_View.searchMap();
            });
        },

        searchMap: function () {
            var golo_create_markers = function (data, map) {
                var infowindow = new google.maps.InfoWindow();

                $.each(data, function (i, value) {

                    let html_review = '';
                    let html_category = '';

                    if (value.avg_review.length) {
                        html_review = `
                            ${value.avg_review[0]['aggregate']} <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><path fill="#DDD" fill-rule="evenodd" d="M6.12.455l1.487 3.519 3.807.327a.3.3 0 0 1 .17.525L8.699 7.328l.865 3.721a.3.3 0 0 1-.447.325L5.845 9.4l-3.272 1.973a.3.3 0 0 1-.447-.325l.866-3.721L.104 4.826a.3.3 0 0 1 .17-.526l3.807-.327L5.568.455a.3.3 0 0 1 .553 0z"/></svg>
                            `;
                    }

                    if (value.categories) {
                        for (var j = 0; j < value.categories.length; j++) {
                            html_category += `<a style="color: #666;"> ${value.categories[j]['name']}</a>`;
                        }
                    }

                    var html_infowindow = `
                        <div id='infowindow'>
                            <div class="places-item" data-title="${value.name}" data-lat="-33.796864" data-lng="150.620614" data-index="${i}">
                                <a href="/place/${value.slug}"><img src="/uploads/${value.thumb}" alt=""></a>
                                <div class="places-item__info">
                                    <span class="places-item__category">${html_category}</span>
                                    <a href="/place/${value.slug}"><h3>${value.name}</h3></a>
                                    <div class="places-item__meta">
                                        <div class="places-item__reviews">
                                            <span class="places-item__number">
                                                ${html_review}
                                                <span class="places-item__count">(${value.reviews_count} reviews)</span>
                                            </span>
                                        </div>
                                        <div class="places-item__currency">${PRICE_RANGE[value.price_range]}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;

                    let marker_options = {
                        position: {lat: parseFloat(value.lat), lng: parseFloat(value.lng)},
                        map: map,
                        draggable: false,
                        animation: google.maps.Animation.DROP
                    };
                    if (value.categories[0].icon_map_marker) {
                        marker_options.icon = {
                            url: `/uploads/${value.categories[0].icon_map_marker}`
                        }
                    }
                    let marker = new google.maps.Marker(marker_options);
                    marker.addListener('click', function () {
                        infowindow.setContent(html_infowindow);
                        infowindow.open(map, this);
                    });
                }); // End each data

            };

            // call api get places
            let city_id = $('#city_id').val();
            let category_id = $('#category_id').val();
            $.ajax({
                dataType: 'json',
                url: `${app_url}/places/map`,
                data: {
                    'city_id': city_id,
                    'category_id': category_id,
                },
                beforeSend: function () {
                    console.log("before call api get places map");
                },
                success: function (response) {
                    let data = response.data;

                    var golo_map_style_silver = [
                        {
                            "featureType": "landscape",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "stylers": [
                                {
                                    "hue": "#00aaff"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "gamma": 2.15
                                },
                                {
                                    "lightness": 12
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "lightness": 24
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "lightness": 57
                                }
                            ]
                        }
                    ];
                    var golo_map_option = {
                        scrollwheel: false,
                        scroll: {x: $(window).scrollLeft(), y: $(window).scrollTop()},
                        zoom: 12,
                        center: {lat: parseFloat(data.city.lat), lng: parseFloat(data.city.lng)},
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControl: false,
                        fullscreenControl: true,
                        streetViewControl: true,
                        disableDefaultUI: false,
                        styles: golo_map_style_silver,
                        zoomControlOptions: {
                            position: google.maps.ControlPosition.RIGHT_CENTER
                        },
                        streetViewControlOptions: {
                            position: google.maps.ControlPosition.RIGHT_CENTER
                        },
                        fullscreenControlOptions: {
                            position: google.maps.ControlPosition.RIGHT_CENTER
                        }
                    };

                    var map = new google.maps.Map(document.getElementById('maps-view'), golo_map_option);
                    golo_create_markers(data.places, map);

                },
            });


        }
    };

    GL_Map_View.init();

// })(jQuery);
