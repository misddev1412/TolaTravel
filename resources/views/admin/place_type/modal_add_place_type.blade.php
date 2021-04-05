<div class="modal fade" id="modal_add_place_type" tabindex="-1" role="dialog" aria-labelledby="modal_add_place_type" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add place type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form action="{{Request::fullUrl()}}" method="post" data-parsley-validate>
                <input type="hidden" id="add_place_type_method" name="_method" value="POST">
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

                            <div class="form-group">
                                <label for="password">Category: *</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="tab-content">
                                @foreach($languages as $index => $language)
                                    <div class="tab-pane fade show {{$index !== 0 ?: "active"}}" id="language_{{$language->code}}" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="form-group">
                                            <label for="name">Place type name <small>({{$language->code}})</small>: *</label>
                                            <input type="text" class="form-control" name="{{$language->code}}[name]" required>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label for="name">Place type name: *</label>--}}
                                {{--<input type="text" class="form-control" id="place_type_name" name="name" required>--}}
                            {{--</div>--}}

                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <input type="hidden" id="place_type_id" name="place_type_id" value="">
                    <button class="btn btn-primary" id="submit_add_place_type">Add</button>
                    <button class="btn btn-primary" id="submit_edit_place_type">Save</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>

        </div>
    </div>
</div>
