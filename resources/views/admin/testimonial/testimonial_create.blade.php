@extends('admin.layouts.template')

@section('main')
    <div class="page-title">
        <div class="title_left">
            @if(isRoute('admin_testimonial_page_edit'))
                <h3>Edit testimonial</h3>
            @else
                <h3>Add testimonial</h3>
            @endif
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title">
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <form class="" action="{{route('admin_testimonial_action')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isRoute('admin_testimonial_page_edit'))
                            @method('put')
                        @endif

                        <div class="tab-content">
                            <ul class="nav nav-tabs bar_tabs" role="tablist">
                                @foreach($languages as $index => $language)
                                    <li class="nav-item">
                                        <a class="nav-link {{$index !== 0 ?: "active"}}" id="home-tab" data-toggle="tab" href="#language_{{$language->code}}" role="tab" aria-controls="" aria-selected="">{{$language->name}}</a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        @foreach($languages as $index => $language)
                                            @php
                                                $trans = $testimonial ? $testimonial->translate($language->code) : [];
                                            @endphp
                                            <div class="tab-pane fade show {{$index !== 0 ?: "active"}}" id="language_{{$language->code}}" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="form-group">
                                                    <label for="name">Name
                                                        <small>({{$language->code}})</small>
                                                        : *</label>
                                                    @if(isRoute('admin_testimonial_page_add'))
                                                        <input type="text" class="form-control" id="name" name="{{$language->code}}[name]" placeholder="Enter name of customer" autocomplete="off">
                                                    @else
                                                        <input type="text" class="form-control" id="name" name="{{$language->code}}[name]" value="{{$trans['name']}}" placeholder="Enter name of customer" autocomplete="off">
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="job_title">Job title
                                                        <small>({{$language->code}})</small>
                                                        : *</label>
                                                    @if(isRoute('admin_testimonial_page_add'))
                                                        <input type="text" class="form-control" id="job_title" name="{{$language->code}}[job_title]" placeholder="Enter job title of customer" autocomplete="off">
                                                    @else
                                                        <input type="text" class="form-control" id="job_title" name="{{$language->code}}[job_title]" value="{{$trans['job_title']}}" placeholder="Enter job title of customer" autocomplete="off">
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="content">Content
                                                        <small>({{$language->code}})</small>
                                                        : *</label>
                                                    @if(isRoute('admin_testimonial_page_add'))
                                                        <textarea type="text" class="form-control" id="content" name="{{$language->code}}[content]" placeholder="Enter content of customer" autocomplete="off"></textarea>
                                                    @else
                                                        <textarea type="text" class="form-control" id="content" name="{{$language->code}}[content]" placeholder="Enter content of customer" autocomplete="off">{{$trans['content']}}</textarea>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label for="place_name">Avatar:</label>
                                        <br>
                                        @if($testimonial['avatar'])
                                            <img id="preview_avatar" src="{{getImageUrl($testimonial['avatar'])}}" style="width:150px; height: 150px;border-radius: 50%">
                                        @else
                                            <img id="preview_avatar" src="https://via.placeholder.com/150x150?text=thumbnail" style="width:150px; height: 150px;border-radius: 50%">
                                        @endif
                                        <input type="file" class="form-control" id="avatar" name="avatar">
                                    </div>
                                </div>
                            </div>

                            <div>
                                @if(isRoute('admin_testimonial_page_edit'))
                                    <input type="hidden" name="id" value="{{$testimonial['id']}}">
                                    <button type="submit" class="btn btn-primary mt-20">Save</button>
                                @else
                                    <button type="submit" class="btn btn-primary mt-20">Add</button>
                                @endif
                            </div>

                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

@stop

@push('scripts')
    <script>
        $('#avatar').change(function () {
            previewUploadImage(this, 'preview_avatar')
        });
    </script>
@endpush

@push('style')
@endpush

