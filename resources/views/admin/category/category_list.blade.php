@extends('admin.layouts.template')

@section('main')

    <div class="page-title">
        <div class="title_left">
            <h3>Categories</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <button class="btn btn-primary" id="btn_add_category" type="button">+ Add category</button>
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
                            <th>Category Name</th>
                            @if($type === \App\Models\Category::TYPE_PLACE)
                                <th>Priority</th>
                                <th>Is feature</th>
                            @endif
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                @if($type === \App\Models\Category::TYPE_PLACE)
                                <td>{{$category->priority}}</td>
                                <td>
                                    <input type="checkbox" class="js-switch category_is_feature" name="is_feature" data-id="{{$category->id}}" {{isChecked(1, $category->is_feature)}} />
                                </td>
                                @endif
                                <td>
                                    <input type="checkbox" class="js-switch category_status" name="status" data-id="{{$category->id}}" {{isChecked(1, $category->status)}} />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-xs category_edit"
                                            data-id="{{$category->id}}"
                                            data-name="{{$category->name}}"
                                            data-slug="{{$category->slug}}"
                                            data-priority="{{$category->priority}}"
                                            data-isfeature="{{$category->is_feature}}"
                                            data-featuretitle="{{$category->feature_title}}"
                                            data-colorcode="{{$category->color_code}}"
                                            data-icon="{{$category->icon_map_marker}}"
                                            data-translations="{{$category->translations}}"

                                            data-seotitle="{{$category->seo_title}}"
                                            data-seodescription="{{$category->seo_description}}"
                                    >Edit
                                    </button>
                                    <form class="d-inline" action="{{route('admin_category_delete',$category->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-xs category_delete">Delete</button>
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

    @include('admin.category.modal_add_category')
@stop

@push('scripts')
    <script src="{{asset('admin/js/page_category.js')}}"></script>
@endpush
