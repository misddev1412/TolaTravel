@extends('admin.layouts.template')

@section('main')

    <div class="page-title">
        <div class="title_left">
            <h3>Countries</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn_add_country" type="button">+ Add country</button>
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
                            <th>ID</th>
                            <th>Country Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($countries as $country)
                            <tr>
                                <td>{{$country->id}}</td>
                                <td>{{$country->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-xs country_edit"
                                            data-id="{{$country->id}}"
                                            data-name="{{$country->name}}"
                                            data-slug="{{$country->slug}}"
                                    >Edit
                                    </button>
                                    <form class="d-inline" action="{{route('admin_country_delete',$country->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-xs country_delete">Delete</button>
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

    @include('admin.country.modal_add_country')
@stop

@push('scripts')
    <script src="{{asset('admin/js/page_country.js')}}"></script>
@endpush