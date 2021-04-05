@extends('admin.layouts.template')

@section('main')
    <div class="page-title">
        <div class="title_left">
            <h3>Add new</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <form action="{{route('admin_post_create')}}" enctype="multipart/form-data" method="post">
            @if(isRoute('admin_post_edit'))
                @method('put')
            @endif
            @csrf

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
                            @foreach($languages as $index => $language)
                                @php
                                    $trans = $post ? $post->translate($language->code) : [];
                                @endphp
                                <div class="tab-pane fade show {{$index !== 0 ?: "active"}}" id="language_{{$language->code}}" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="post_title_{{$language->code}}">Title
                                                <small>({{$language->code}})</small>
                                                : *</label>
                                            <input type="text" class="form-control post_title" id="post_title_{{$language->code}}" name="{{$language->code}}[title]" value="{{$trans ? $trans->title :''}}" placeholder="Add title" autocomplete="off" {{$index !== 0 ?: "required"}}>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_content_{{$language->code}}">Content
                                            <small>({{$language->code}})</small>
                                            :</label>
                                        <textarea type="text" class="form-control tinymce_editor" id="post_content_{{$language->code}}" name="{{$language->code}}[content]" rows="10">{{$trans ? $trans->content :''}}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Golo SEO</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-group">
                            <label for="seo_title">SEO title:</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{$post['seo_title'] ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="seo_description">Meta Description:</label>
                            <textarea class="form-control" id="seo_description" name="seo_description">{{$post['seo_description'] ?? ''}}</textarea>
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
                        <input type="hidden" name="type" value="{{$post_type}}">
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

                @if(($post_type === \App\Models\Post::TYPE_BLOG) || ($post['type'] ?? '' === \App\Models\Post::TYPE_BLOG))
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Category</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @foreach($categories as $cat)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="flat" name="category[]" value="{{$cat->id}}" {{isChecked($cat->id, $post['category'] ?? '')}}> {{$cat->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

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

            </div>

        </form>
    </div>
@stop

@push('scripts')
    <script src="{{asset('admin/js/page_post.js')}}"></script>

    @if(($post_type === \App\Models\Post::TYPE_BLOG) || ($post['type'] ?? '' === \App\Models\Post::TYPE_BLOG))
        <script>
            $("#menu_blog").addClass("active");
            $("#menu_blog .child_menu").show();
        </script>
    @else
        <script>
            $("#menu_pages").addClass("active");
        </script>
    @endif
@endpush