@extends('admin.layouts.template')

@section('main')
    <div class="page-title">
        <div class="title_left">
            <h3>Amenities</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn_add_amenities" type="button">+ Add amenities</button>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <table class="table table-striped table-bordered golo-datatable">
                        <thead>
                        <tr>
                            <th width="3%">ID</th>
                            <th width="5%">Icon</th>
                            <th>Amenities Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($amenities as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td><img class="amenities_icon" src="{{getImageUrl($item->icon)}}" alt="Amenities icon"></td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-xs amenities_edit"
                                            data-id="{{$item->id}}"
                                            data-name="{{$item->name}}"
                                            data-icon="{{$item->icon}}"
                                            data-translations="{{$item->translations}}"
                                    >Edit
                                    </button>
                                    <form class="d-inline" action="{{route('admin_amenities_delete',$item->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-xs amenities_delete">Delete</button>
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

    @include('admin.amenities.modal_add_amenities')
@stop

@push('scripts')
    <script src="{{asset('admin/js/page_amenities.js')}}"></script>
@endpush