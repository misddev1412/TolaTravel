<div class="modal fade" id="modal_add_country" tabindex="-1" role="dialog" aria-labelledby="modal_add_country" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add country</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form action="{{route('admin_country_create')}}" method="post" data-parsley-validate>
                <input type="hidden" id="add_country_method" name="_method" value="POST">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Country name: *</label>
                                <input type="text" class="form-control" id="country_name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Slug: *</label>
                                <input type="text" class="form-control" id="country_slug" name="slug" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" id="country_id" name="country_id" value="1">
                    <button type="submit" class="btn btn-primary" id="submit_add_country">Add</button>
                    <button class="btn btn-primary" id="submit_edit_country">Save</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>

        </div>
    </div>
</div>