@extends('admin.layouts.template')
@section('main')
    <div class="page-title">
        <div class="title_left">
            <h3>Reviews</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-3 form-group">

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <table class="table table-striped table-bordered golo-datatable">
                        <thead>
                        <tr>
                            <th width="3%">ID</th>
                            <th width="15%">Reviewer</th>
                            <th width="15%">Place name</th>
                            <th>Comment</th>
                            <th width="10%">Star</th>
                            <th width="10%">Status</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($reviews as $review)
                            <tr>
                                <td>{{$review->id}}</td>
                                <td><a>{{$review['user']['name']}}</a></td>
                                <td>
                                    @if(isset($review['place']['slug']))
                                        <a href="{{route('place_detail', $review['place']['slug'])}}" target="_blank">{{$review['place']['name']}}</a>
                                    @else
                                        {{$review['place']['name'] ?? ''}}
                                    @endif
                                </td>
                                <td>{{$review->comment}}</td>
                                <td>{{$review->score}}</td>
                                <td><input type="checkbox" class="js-switch review_status" name="status" data-id="{{$review->id}}" {{isChecked(1, $review->status)}} /></td>
                                <td>
                                    <form class="d-inline" action="{{route('admin_review_delete')}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="review_id" value="{{$review->id}}">
                                        <button type="button" class="btn btn-danger btn-xs review_delete">Delete</button>
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
@stop

@push('scripts')
    <script src="{{asset('admin/js/page_review.js')}}"></script>
@endpush