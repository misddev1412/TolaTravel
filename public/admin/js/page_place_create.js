$('input[type=text]').on('keydown', function (e) {
    if (e.which === 13) {
        e.preventDefault();
    }
});

var customerBox = $('.place_create_menu').offset().top;
$(window).scroll(function () {
    if ($(window).scrollTop() >= customerBox) {
        $('.place_create_menu').addClass('scroll-top');
    } else {
        $('.place_create_menu').removeClass('scroll-top');
    }
});

$('.cb_openday').change(function (event) {
    console.log("checkbox_day:", event.currentTarget);
});

$('#social_addmore').click(function () {
    let social_list = $('#social_list');
    let social_item = $('.social_item').length;
    social_list.append(`
                <div class="row form-group social_item" id="social_item_${social_item}">
                    <div class="col-md-5">
                        <select class="form-control" name="social[${social_item}][name]">
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Youtube">Youtube</option>
                            <option value="Twitter">Twitter</option>
                            <option value="Pinterest">Pinterest</option>
                            <option value="Snapchat">Snapchat</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="social[${social_item}][url]" placeholder="Enter URL include http or www">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger social_item_remove" id="${social_item}">X</button>
                    </div>
                </div>
            `);
});

$(document).on("click", ".social_item_remove", function (event) {
    let id = event.currentTarget.getAttribute('id');
    $(`#social_item_${id}`).remove();
});

$('#openinghour_addmore').click(function () {
    let openinghour_list = $('#openinghour_list');
    let openinghour_item = $('.openinghour_item').length;
    openinghour_list.append(`
                <div class="row form-group social_item" id="openinghour_item_${openinghour_item}">
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="" name="opening_hour[${openinghour_item}][title]" placeholder="Enter valute: Exp: Monday" ">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="opening_hour[${openinghour_item}][value]" placeholder="enter value. Exp: 9:00 - 21:00">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger openinghour_item_remove" data-id="${openinghour_item}">X</button>
                    </div>
                </div>
            `);
});

$(document).on("click", ".openinghour_item_remove", function (event) {
    let id = event.currentTarget.getAttribute('data-id');
    $(`#openinghour_item_${id}`).remove();
});

$('#thumb').change(function () {
    previewUploadImage(this, 'preview_thumb')
});

$('#select_country').change(function () {
    let country_id = $(this).val();
    let select_city = $('#select_city');
    let data_resp = callAPI({
        url: getUrlAPI(`${app_url}/cities/${country_id}`, 'full'),
        method: "GET"
    });
    data_resp.then(res => {
        let html = '';
        res.forEach(function (value, index) {
            html += `<option value="${value.id}">${value.name}</option>`;
        });
        select_city.find('option').remove();
        select_city.append(html);
    });
});

$('#gallery').change(function () {
    var form_data = new FormData();
    form_data.append('image', this.files[0]);
    form_data.append('_token', CSRF_TOKEN);
    $.ajax({
        url: getUrlAPI('/upload-image', 'api'),
        data: form_data,
        type: 'POST',
        contentType: false,
        processData: false,
        success: function (res) {
            if (res.fail) {
                alert(res.errors['image']);
            } else {
                if (res.code === 200) {
                    let html = `
                                <div class="col-sm-2 media-thumb-wrap">
                                    <figure class="media-thumb">
                                        <img src="/uploads/${res.file_name}">
                                        <div class="media-item-actions">
                                            <a class="icon icon-delete" data-filename="${res.file_name}" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                                    <g fill="#5D5D5D" fill-rule="nonzero">
                                                        <path d="M14.964 2.32h-4.036V0H4.105v2.32H.07v1.387h1.37l.924 12.25H12.67l.925-12.25h1.369V2.319zm-9.471-.933H9.54v.932H5.493v-.932zm5.89 13.183H3.65L2.83 3.707h9.374l-.82 10.863z"></path>
                                                        <path d="M6.961 6.076h1.11v6.126h-1.11zM4.834 6.076h1.11v6.126h-1.11zM9.089 6.076h1.11v6.126h-1.11z"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                            <input type="hidden" name="gallery[]" value="${res.file_name}">
                                            <span class="icon icon-loader" style="display: none;"><i class="fa fa-spinner fa-spin"></i></span>
                                        </div>
                                    </figure>
                                </div>
                            `;
                    $('#place_gallery_thumbs').append(html);
                }
            }
        },
        error: function (xhr, status, error) {
            alert('An error occurred!');
            console.log(xhr.responseText);
        }
    });
});

$(document).on("click", ".icon-delete", function (event) {
    event.preventDefault();
    let thumbnail = $(this).closest('.media-thumb-wrap');
    thumbnail.remove();
});

$('input[name=booking_type]').change(function () {
    let booking_type = $(this).val();

    console.log("booking_type: ", booking_type);

    if (booking_type == 3) {
        console.log("showwww");
        $('#booking_affiliate_link').show();
    } else {
        $('#booking_affiliate_link').hide();
    }
});

$(function () {
    $("#place_gallery_thumbs").sortable().disableSelection();
});

function placeMap() {
    let place_lat = parseFloat($('#place_lat').val()) || -33.8688;
    let place_lng = parseFloat($('#place_lng').val()) || 151.2195;

    let map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: place_lat, lng: place_lng},
        zoom: 16,
        mapTypeId: 'roadmap',
        mapTypeControl: false,
        fullscreenControl: true,
        streetViewControl: false,
        disableDefaultUI: false,
    });

    // Create marker by lat,lng
    let latLng = new google.maps.LatLng(place_lat, place_lng);
    new google.maps.Marker({
        position: latLng,
        map: map,
        draggable: true
    });

    // Create the search box and link it to the UI element.
    let input = document.getElementById('place_address');
    let searchBox = new google.maps.places.SearchBox(input);
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
    });

    let markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function () {
        let places = searchBox.getPlaces();

        if (places.length === 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        let bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }

            console.log("place:", place);
            console.log("latitude: " + place.geometry.location.lat() + ", longitude: " + place.geometry.location.lng());

            $('#place_address').val(place.formatted_address);
            $('#place_lat').val(place.geometry.location.lat());
            $('#place_lng').val(place.geometry.location.lng());

        });
        map.fitBounds(bounds);
    });
}
