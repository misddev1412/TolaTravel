@extends('admin.layouts.template')

@section('main')
    <div class="page-title">
        <div class="title_left">
            <h3>Add new</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row hotel_create">
        <form action="{{route('admin_hotel_create')}}" enctype="multipart/form-data" method="post">
            @if(isRoute('admin_hotel_edit'))
                @method('put')
            @endif
            @csrf
            <input type="hidden" name="hotel_id" value="{{$hotel_id}}">

            <div class="col-md-8 col-sm-8 col-xs-12">

                <div class="x_panel">
                    <div class="x_content">
                       
                        <ul class="nav nav-tabs bar_tabs" role="tablist">
                            @foreach($languages as $index => $language)
                                <li class="nav-item">
                                    <a class="nav-link {{$index !== 0 ?: "active"}}" id="home-tab" data-toggle="tab" href="#language_{{$language->code}}" role="tab" aria-controls="" aria-selected="">{{$language->name}}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name">Name
                                       
                                        : *</label>
                                    <input type="text" class="form-control post_title"  name="name" value="" placeholder="Hotel name" autocomplete="off">
                                </div>
                            </div>
                       
                            <div class="form-group">
                                <label for="place_address">Hotel Address: *</label>
                                <input type="text" class="form-control" id="place_address" name="address" placeholder="Full Address" autocomplete="off">
                
                                <input type="hidden" id="place_lat" name="lat">
                                <input type="hidden" id="place_lng" name="lng">
                            </div>
                
                            {{--<input type="text" id="pac-input" class="form-control" placeholder="Search address..." autocomplete="off">--}}
                            <div id="map"></div>
                            @foreach($languages as $index => $language)
                                @php
                                    $trans = !empty($hotel) ? $hotel->translate($language->code) : [];
                                @endphp
                                <div class="tab-pane fade show {{$index !== 0 ?: "active"}}" id="language_{{$language->code}}" role="tabpanel" aria-labelledby="home-tab">
                                 
                                    <div class="form-group">
                                        <label for="post_content_{{$language->code}}">About
                                            <small>({{$language->code}})</small>
                                            :</label>
                                        <textarea type="text" class="form-control tinymce_editor" id="post_content_{{$language->code}}" name="{{$language->code}}[about]" rows="10">{{$trans ? $trans->about :''}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_content_{{$language->code}}">Policy
                                            <small>({{$language->code}})</small>
                                            :</label>
                                        <textarea type="text" class="form-control tinymce_editor" id="post_policy_{{$language->code}}" name="{{$language->code}}[policy]" rows="10">{{$trans ? $trans->policy :''}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_content_{{$language->code}}">Short Description
                                            <small>({{$language->code}})</small>
                                            :</label>
                                        <textarea type="text" class="form-control" id="post_s_description_{{$language->code}}" name="{{$language->code}}[short_description]" rows="10">{{$trans ? $trans->short_description :''}}</textarea>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name">Currency
                                       
                                        : *</label>
                                    <select name="currency" class="form-control" id="">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Publish</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <input type="hidden" name="post_id" value="{{$post['id'] ?? ''}}">
                        <button type="submit" class="btn btn-success">
                            @if(isRoute('admin_post_edit'))
                                Update
                            @else
                                Submit
                            @endif
                        </button>
                    </div>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{__('Manage Room')}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <ul class="room__list">
                          
                       </ul>
                       <a href="#" id="btn_add_room" class="add_more__room"><i class="fa fa-plus mr-2"></i>{{__('Add more room')}}</a>
                    </div>
                </div>

             
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thumbnail image</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <label class="post_thumb" for="post_thumb">
                            <img id="preview_thumb" src="{{getImageUrl($post['thumb'] ?? '')}}" alt="post thumb">
                            <input type="file" class="form-control" id="post_thumb" name="thumb" accept="image/*">
                        </label>
                    </div>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Gallery image</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="coba"></div>
                    </div>
                </div>

            </div>

        </form>
    </div>
    @include('admin.hotel.modal_add_room')

@stop

@push('scripts')
    <script src="{{asset('admin/js/page_post.js')}}"></script>
    <script src="{{asset('admin/js/page_hotel.js')}}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('admin/js/page_place_create.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName:        'fileUpload[]',
                maxCount:         5,
                rowHeight:        '200px',
                groupClassName:   'col-md-4 col-sm-4 col-xs-6',
                allowedExt:       'png|jpg|jpeg',
                dropFileLabel:    "Drop Here",
                placeholderImage: {
                    image: 'https://storage.googleapis.com/exchange-289306.appspot.com/tola/Artboard%201.png',
                    width: '100%'
                },
                onAddRow:       function(index){
                    console.log(index);
                    console.log('add new row');
                },
                onRenderedPreview : function(index){
                    console.log(index);
                    console.log('preview rendered');
                },
                onRemoveRow : function(index){
                    console.log(index);
                    console.log('remove row');
                },
                onExtensionErr : function(index, file){
                    console.log(index, file);
                    alert('Please only input png or jpg type file');
                },
                onSizeErr : function(index, file){
                    console.log(index, file);
                    alert('File size too big');
                }
            });
            $("#room_gallery").spartanMultiImagePicker({
                fieldName:        'room_gallery[]',
                maxCount:         5,
                rowHeight:        '200px',
                groupClassName:   'col-md-4 col-sm-4 col-xs-6',
                allowedExt:       'png|jpg|jpeg',
                dropFileLabel:    "Drop Here",
                placeholderImage: {
                    image: 'https://storage.googleapis.com/exchange-289306.appspot.com/tola/Artboard%201.png',
                    width: '100%'
                },
                onAddRow:       function(index){
                    console.log(index);
                    console.log('add new row');
                },
                onRenderedPreview : function(index){
                    console.log(index);
                    console.log('preview rendered');
                },
                onRemoveRow : function(index){
                    console.log(index);
                    console.log('remove row');
                },
                onExtensionErr : function(index, file){
                    console.log(index, file);
                    alert('Please only input png or jpg type file');
                },
                onSizeErr : function(index, file){
                    console.log(index, file);
                    alert('File size too big');
                }
            });


            $('#room_thumb').change(function () {
                previewUploadImage(this, 'room_preview_thumb')
            });

            $("#form_room_add").on('submit', function (e) {
                e.preventDefault()
                // var formDataArray = $(this).serializeArray();
                var fd = new FormData(this);
         

                // var files = $('[name="thumb"]')[0].files;
                // if(files.length > 0 ){
                //     console.log(files)
                //     fd.append('file',files[0]);
                // }
                console.log(fd)
                $.ajax({
                    type: "POST",
                    url: "{{route('admin_room_store')}}",
                    data: fd,
                    dataType: 'json',
                    processData: false,
                    contentType: false,

                    beforeSend: function () {
                       
                    },
                    success: function (response) {
                        if (response.status === 200) {
                            $('#modal_add_room').modal('hide')
                            $('.room__list').append(`<li data-room-id="${response.id}"><span><a class="room__title" href='#'>${response.type}</a></span> <div class="room__action"><span class="mr-2" onclick="editRoom(${response.id})">Edit</span> <span onclick="deleteRoom(${response.id})">Delete</span></div></li>`)
                        }
                    },
                    error: function (jqXHR) {
                       
                    }
                });
            })
        })

        function editRoom(id)
        {
            $.ajax({
                type: "GET",
                url: "{{route('admin_room_edit')}}",
                data: {
                    '_token': CSRF_TOKEN,
                    'id': id
                },
                dataType: 'json',
                beforeSend: function () {
                    
                },
                success: function (response) {
                    if (response.status === 200) {
                        $('#modal_add_room').modal('show')
                        $('[name="room_type_id"]').val(response.data.room_type_id).change();
                        $('[name="price"]').val(response.data.price);
                        $('[name="promotion_price"]').val(response.data.promotion_price);
                        $('[name="capacity"]').val(response.data.capacity);
                        $('[name="bed"]').val(response.data.bed);
                        $('[name="pass_wifi"]').val(response.data.pass_wifi);
                        if (response.data.thumb) {
                            $('#room_preview_thumb').attr('src', `/uploads/${response.data.thumb}`);
                        } else {
                            $('#room_preview_thumb').attr('src', `https://storage.googleapis.com/exchange-289306.appspot.com/tola/Artboard%201.png`);
                        }
                         
                    }
                },
                error: function (jqXHR) {
                    
                }
            });
        }
    </script>
@endpush
