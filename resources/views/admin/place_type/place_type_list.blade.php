@extends('admin.layouts.template')

@section('main')

    <div class="page-title">
        <div class="title_left">
            <h3>Place types</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn_add_place_type" type="button">+ Add place type</button>
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
                            <label>Select Category:</label>
                            <form>
                                <select class="form-control" id="select_category_id" name="category_id" onchange="this.form.submit()">
                                    <option value="">--- Select category ---</option>
                                    @foreach($categories as $cat)
                                        @if($category_id)
                                            <option value="{{$cat->id}}" {{isSelected($cat->id, $category_id)}}>{{$cat->name}}</option>
                                        @else
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
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
                            <th>ID</th>
                            <th>Place type name</th>
                            <th>Category name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($place_types as $place_type)
                            <tr>
                                <td>{{$place_type->id}}</td>
                                <td>{{$place_type->name}}</td>
                                <td>{{$place_type['category']['name']}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-xs place_type_edit"
                                            data-id="{{$place_type->id}}"
                                            data-catid="{{$place_type->category_id}}"
                                            data-name="{{$place_type->name}}"
                                            data-translations="{{$place_type->translations}}"
                                    >Edit
                                    </button>
                                    <form class="d-inline" action="{{route('admin_place_type_delete',$place_type->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-xs place_type_delete">Delete</button>
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

    @include('admin.place_type.modal_add_place_type')
@stop

@push('scripts')
    <script src="{{asset('admin/js/page_place_type.js')}}"></script>
@endpush