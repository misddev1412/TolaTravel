<div class="modal fade" id="modal_add_room" tabindex="-1" role="dialog" aria-labelledby="modal_add_room" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Add Room')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            {{-- <form action="{{route('admin_room_store')}}" method="post" enctype="multipart/form-data" data-parsley-validate> --}}
                <input type="hidden" id="add_room_method" name="_method" value="POST">
                <input type="hidden"  name="hotel_id" value="{{$hotel_id}}" value="POST">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 room_create">
                            <div class="form-group">
                                <label for="room_name">Room type: *</label>
                                <select name="room_type_id" class="form-control">
                                    <option value="">{{__('Please select room type')}}</option>
                                    @foreach($room_types as $room_type)
                                    <option value="{{$room_type->id}}">{{$room_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="room_intro">{{__('Room Price')}}: *</label>
                                        <input type="number" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="room_intro">{{__('Room Promotion Price')}}: *</label>
                                        <input type="number" class="form-control" name="promotion_price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="room_intro">{{__('Capacity')}}: *</label>
                                        <input type="number" class="form-control" name="capacity">
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="room_intro">{{__('Bed')}}: *</label>
                                        <input type="number" class="form-control" name="bed">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="room_intro">{{__('Pass Wifi')}}:</label>
                                        <input type="text" class="form-control" name="pass_wifi">
                                    </div>
                                </div>
                               
                            </div>
                           
                         

                
                            <div class="row room_image">
                                <div class="col-md-4">
                                    <p><strong>Thumbnail image:</strong></p>
                                    <img id="preview_thumb" src="https://storage.googleapis.com/exchange-289306.appspot.com/tola/Artboard%201.png" alt="city thumb">
                                    <input type="file" class="form-control" id="room_thumb" name="thumb" accept="image/*">
                                </div>
                                <div class="col-md-8 gallery__room_box">
                                    <p><strong>{{__('Gallery Image')}}:</strong></p>
                                    <div id="room_gallery"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div id="hightlight">
                                            <p class="lead">Amenities</p>
                                            <div class="checkbox row">
                                                <div class="col-sm-12 amenities__container">
                                                    @foreach($amenitiesType as $index => $type)
                                                        <div class="amenities__box">
                                                            <label for="">{{$type}}</label>
                                                            @foreach($amenities as $item)
                                                                @if($index == $item->type)
                                                                    <div class="amenities__box_item">
                                                                        <label class="p-0"><input type="checkbox" class="flat" name="amenities[]" value="{{$item->id}}"> {{$item->name}}</label>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                           

                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <input type="hidden" id="room_id" name="room_id" value="">
                    <button class="btn btn-primary" type="button" id="submit_add_room">Add</button>
                    <button class="btn btn-primary" id="submit_edit_city">Save</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            {{-- </form> --}}

        </div>
    </div>
</div>
