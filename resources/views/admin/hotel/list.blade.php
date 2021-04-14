@extends('admin.layouts.template')

@section('main')
    <div class="page-title">
        <div class="title_left">
            <h3>Hotel</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('admin_hotel_add')}}">+ Add hotel</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Select Country:</label>
                            <form>
                                <select class="form-control" id="select_country_id" name="country_id" onchange="this.form.submit()">
                                    <option value="">--- Select country ---</option>
                                    @foreach($countries as $country)
                                        @if($country_id)
                                            <option value="{{$country->id}}" {{isSelected($country->id, $country_id)}}>{{$country->name}}</option>
                                        @else
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <table class="table table-striped table-bordered golo-datatable">
                        <thead>
                        <tr>
                            <th width="3%">ID</th>
                            <th width="5%">Thumb</th>
                            <th width="10%">Hotel Name</th>
                            <th width="15%">Hotel Address</th>
                            <th>Short Description</th>
                            <th width="3%">Status</th>
                            <th width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($hotels as $hotel)
                            <tr>
                                <td>{{$hotel->id}}</td>
                                <td><img class="city_list_img" src="{{getImageUrl($hotel->thumb)}}" alt="city thumb"></td>
                                <td>{{$hotel->name}}</td>
                                <td>{{$hotel->short_description}}</td>
                                <td>{{$hotel->address}}</td>
                                <td>
                                    <input type="checkbox" class="js-switch city_status" data-id="{{$hotel->id}}" {{isChecked($hotel->status, 1)}}/>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-xs hotel_edit"
                                          
                                    >Edit
                                    </button>
                                    <form class="d-inline" action="{{route('admin_city_delete',$hotel->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-xs hotel_delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>

@stop

@push('scripts')
    <script src="{{asset('admin/js/page_hotel.js')}}"></script>
@endpush