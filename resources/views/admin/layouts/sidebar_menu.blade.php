<div class="left_col scroll-view">
    <div class="navbar nav_title border-0">
        <a href="{{route('admin_dashboard')}}" class="site_title"><i class="admin_logo"></i><span>ADMIN</span></a>
    </div>
    <div class="clearfix"></div>
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <ul class="nav side-menu">
                <li><a href="{{route('admin_dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>

                <li id="menu_place">
                    <a><i class="fa fa-map-marker"></i> Place <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('admin_place_list')}}"><i class="fa fa-map-marker"></i>All Places</a></li>
                        <li><a href="{{route('admin_place_type_list')}}"><i class="fa fa-tags"></i> Place Type</a></li>
                        <li><a href="{{route('admin_category_list', \App\Models\Category::TYPE_PLACE)}}"><i class="fa fa-list"></i> Categories</a></li>
                        <li><a href="{{route('admin_amenities_list')}}"><i class="fa fa-wifi"></i> Amenities</a></li>
                        <li><a href="{{route('admin_city_list')}}"><i class="fa fa-building"></i> Cities</a></li>
                        <li><a href="{{route('admin_country_list')}}"><i class="fa fa-globe"></i> Countries</a></li>
                    </ul>
                </li>

                <li id="menu_blog">
                    <a><i class="fa fa-newspaper-o"></i> Blog <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('admin_post_list_blog')}}">All Posts</a></li>
                        <li><a href="{{route('admin_category_list', \App\Models\Category::TYPE_POST)}}">Categories</a></li>
                    </ul>
                </li>
                <li id="menu_pages"><a href="{{route('admin_post_list_page')}}"><i class="fa fa-clone"></i> Pages</a></li>

                <li id="menu_pages"><a href="{{route('admin_booking_list')}}"><i class="fa fa-calendar"></i> Bookings</a></li>

                <li><a href="{{route('admin_review_list')}}"><i class="fa fa-star-half-o"></i> Reviews</a></li>
                <li><a href="{{route('admin_user_list')}}"><i class="fa fa-users"></i> Users</a></li>

                <li><a href="{{route('admin_testimonial_list')}}"><i class="fa fa-users"></i> Testimonials</a></li>

                <li>
                    <a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('admin_settings')}}"><i class="fa fa-cogs"></i> General Settings</a></li>
                        <li><a href="{{route('admin_settings_language')}}"><i class="fa fa-language"></i> Languages</a></li>
                        <li><a href="{{url('admincp/translations/view/_json')}}"><i class="fa fa-file-text-o"></i> Translations</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
    <!-- /sidebar menu -->

</div>
