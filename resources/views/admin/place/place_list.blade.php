@extends('admin.layouts.template')

@section('main')

    <div class="page-title">
        <div class="title_left">
            <h3>Places</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('admin_place_create_view')}}">+ Add place</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <form class="row">
                        <div class="col-md-3 form-group">
                            <label>Select Country:</label>
                            <select class="form-control" id="select_category_id" name="country_id" onchange="this.form.submit()">
                                <option value="">All Country</option>
                                @foreach($countries as $country)
                                    @if($country_id)
                                        <option value="{{$country->id}}" {{isSelected($country->id, $country_id)}}>{{$country->name}}</option>
                                    @else
                                        <option value="{{$country->id}}" {{isSelected($country->default, 1)}}>{{$country->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Select City:</label>
                            <select class="form-control" id="select_city_id" name="city_id" onchange="this.form.submit()">
                                <option value="">All City</option>
                                @foreach($cities as $city)
                                    @if($city_id)
                                        <option value="{{$city->id}}" {{isSelected($city->id, $city_id)}}>{{$city->name}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Select Categories:</label>
                            <select class="form-control" id="select_category_id" name="category_id" onchange="this.form.submit()">
                                <option value="">All Categories</option>
                                @foreach($categories as $cat)
                                    @if($cat_id)
                                        <option value="{{$cat->id}}" {{isSelected($cat->id, $cat_id)}}>{{$cat->name}}</option>
                                    @else
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <table class="table table-striped table-bordered golo-datatable">
                        <thead>
                        <tr>
                            <th width="3%">ID</th>
                            <th width="5%">Thumb</th>
                            <th>Place name</th>
                            <th>City</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($places as $place)
                            <tr>
                                <td>{{$place->id}}</td>
                                <td><img class="place_list_thumb" src="{{getImageUrl($place->thumb)}}" alt="page thumb"></td>
                                <td>{{$place->name}}</td>
                                <td>{{$place['city']['name']}}</td>
                                <td>
                                    @foreach($place->categories as $cat)
                                        <span class="category_name">{{$cat->name}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($place->status === \App\Models\Place::STATUS_PENDING)
                                        {{STATUS[$place->status]}}
                                    @else
                                        <input type="checkbox" class="js-switch place_status" name="status" data-id="{{$place->id}}" {{isChecked(1, $place->status)}} />
                                    @endif
                                </td>
                                <td class="golo-flex">
                                    <a class="btn btn-warning btn-xs place_edit" href="{{route('admin_place_edit_view', $place->id)}}">Edit</a>
                                    <form action="{{route('admin_place_delete',$place->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-xs place_delete">Delete</button>
                                    </form>
                                    @if($place->status === \App\Models\Place::STATUS_PENDING)
                                        <button type="button" class="btn btn-success btn-xs place_approve" data-id="{{$place->id}}">Approve</button>
                                    @endif
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
    <script src="{{asset('admin/js/page_place.js')}}"></script>
@endpush