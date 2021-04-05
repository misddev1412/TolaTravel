@extends('admin.layouts.template')

@section('main')
    <div class="page-title">
        <div class="title_left">
            <h3>Place create</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs tabs-left place_create_menu">
                            <li class=""><a href="#genaral">Genaral</a></li>
                            <li class=""><a href="#hightlight">Hightlight</a></li>
                            <li class=""><a href="#location">Location</a></li>
                            <li class=""><a href="#contact_info">Contact info</a></li>
                            <li class=""><a href="#social_network">Social network</a></li>
                            <li class=""><a href="#opening_hours">Open hourses</a></li>
                            <li class=""><a href="#media">Media</a></li>
                            <li class=""><a href="#link_affiliate">Booking link</a></li>
                            <li class=""><a href="#golo_seo">Golo SEO</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-8 col-xs-12 place_create">
                        @if($place)
                            @include('admin.place.form_edit')
                        @else
                            @include('admin.place.form_create')
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('admin/js/page_place_create.js')}}"></script>
@endpush