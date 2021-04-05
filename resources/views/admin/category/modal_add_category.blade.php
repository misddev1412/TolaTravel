<div class="modal fade" id="modal_add_category" tabindex="-1" role="dialog" aria-labelledby="modal_add_category" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <form action="{{route('admin_category_create')}}" method="post" data-parsley-validate enctype="multipart/form-data">
                <input type="hidden" id="add_category_method" name="_method" value="POST">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <ul class="nav nav-tabs bar_tabs" role="tablist">
                                @foreach($languages as $index => $language)
                                    <li class="nav-item">
                                        <a class="nav-link {{$index !== 0 ?: "active"}}" id="home-tab" data-toggle="tab" href="#language_{{$language->code}}" role="tab" aria-controls="" aria-selected="">{{$language->name}}</a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach($languages as $index => $language)
                                    <div class="tab-pane fade show {{$index !== 0 ?: "active"}}" id="language_{{$language->code}}" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="form-group">
                                            <label for="name">Category name
                                                <small>({{$language->code}})</small>
                                                : *</label>
                                            <input type="text" class="form-control" name="{{$language->code}}[name]" {{$index !== 0 ?: "required"}}>
                                        </div>

                                        @if($type === \App\Models\Category::TYPE_PLACE)
                                            <div class="form-group">
                                                <label for="name">Feature title <small>({{$language->code}})</small>:</label>
                                                <input type="text" class="form-control" id="category_feature_title" name="{{$language->code}}[feature_title]">
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            {{--<div class="form-group">--}}
                            {{--<label for="name">Category name: *</label>--}}
                            {{--<input type="text" class="form-control" id="category_name" name="name" required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="name">Category slug: *</label>--}}
                            {{--<input type="text" class="form-control" id="category_slug" name="slug" required>--}}
                            {{--</div>--}}
                            @if($type === \App\Models\Category::TYPE_PLACE)
                                <div class="form-group">
                                    <label for="name">Priority:</label>
                                    <input type="text" class="form-control" id="category_priority" name="priority">
                                </div>
                                {{--                                <div class="form-group">--}}
                                {{--                                    <label for="name">Feature title:</label>--}}
                                {{--                                    <input type="text" class="form-control" id="category_feature_title" name="feature_title">--}}
                                {{--                                </div>--}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Icon Map Marker:</strong></p>
                                        <img id="preview_icon" src="https://via.placeholder.com/100x100?text=icon" style="width:60px;height:60px;object-fit:cover;margin-bottom:10px">
                                        <input type="file" class="form-control" id="icon_map_marker" name="icon_map_marker">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p><strong>Color:</strong></p>
                                            <div class="input-group demo2">
                                                <input class="form-control" id="category_color_code" type="text" name="color_code"/>
                                                <span class="input-group-addon"><i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="seo_title">SEO title:</label>
                                        <input type="text" class="form-control" id="seo_title" name="seo_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_description">Meta Description:</label>
                                        <textarea class="form-control" id="seo_description" name="seo_description"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" id="category_id" name="category_id" value="">
                    <input type="hidden" id="category_type" name="type" value="{{$type}}">
                    <button type="submit" class="btn btn-primary" id="submit_add_category">Add</button>
                    <button class="btn btn-primary" id="submit_edit_category">Save</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>

        </div>
    </div>
</div>
