{{-- @extends('frontend.layouts.template')
@push('style')
<link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
@endpush
@section('main')
    <main id="main" class="site-main">
        <div class="content-grid" >
            <!-- PROFILE HEADER -->
            <div class="profile-header">
                <!-- PROFILE HEADER COVER -->
                <figure class="profile-header-cover liquid" style="background: url('https://odindesignthemes.com/vikinger/img/cover/01.jpg') center center / cover no-repeat;">
                    <img src="img/cover/01.jpg" alt="cover-01" style="display: none;">
                </figure>
                <!-- /PROFILE HEADER COVER -->
                <!-- PROFILE HEADER INFO -->
                <div class="profile-header-info">
                    <!-- USER SHORT DESCRIPTION -->
                    <div class="user-short-description big">
                        <!-- USER SHORT DESCRIPTION AVATAR -->
                        <div class="avatar">
                            <image  src="{{getUserAvatar(user()->avatar)}}"></image>
                        </div>
                            
                    
                        <!-- USER SHORT DESCRIPTION AVATAR -->
                        <a class="user-short-description-avatar user-short-description-avatar-mobile user-avatar medium" href="profile-timeline.html">
                            <!-- USER AVATAR BORDER -->
                            <div class="user-avatar-border">
                                <!-- HEXAGON -->
                                <div class="hexagon-120-132" style="width: 120px; height: 132px; position: relative;">
                                    <canvas width="120" height="132" style="position: absolute; top: 0px; left: 0px;"></canvas>
                                </div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR BORDER -->
                            <!-- USER AVATAR CONTENT -->
                            <div class="user-avatar-content">
                                <!-- HEXAGON -->
                                <div class="hexagon-image-82-90" data-src="img/avatar/01.jpg" style="width: 82px; height: 90px; position: relative;">
                                    <canvas width="82" height="90" style="position: absolute; top: 0px; left: 0px;"></canvas>
                                </div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR CONTENT -->
                            <!-- USER AVATAR PROGRESS -->
                            <div class="user-avatar-progress">
                                <!-- HEXAGON -->
                                <div class="hexagon-progress-100-110" style="width: 100px; height: 110px; position: relative;">
                                    <canvas width="100" height="110" style="position: absolute; top: 0px; left: 0px;"></canvas>
                                </div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR PROGRESS -->
                            <!-- USER AVATAR PROGRESS BORDER -->
                            <div class="user-avatar-progress-border">
                                <!-- HEXAGON -->
                                <div class="hexagon-border-100-110" style="width: 100px; height: 110px; position: relative;">
                                    <canvas width="100" height="110" style="position: absolute; top: 0px; left: 0px;"></canvas>
                                </div>
                                <!-- /HEXAGON -->
                            </div>
                            <!-- /USER AVATAR PROGRESS BORDER -->
                            <!-- USER AVATAR BADGE -->
                            <div class="user-avatar-badge">
                                <!-- USER AVATAR BADGE BORDER -->
                                <div class="user-avatar-badge-border">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-32-36" style="width: 32px; height: 36px; position: relative;">
                                        <canvas width="32" height="36" style="position: absolute; top: 0px; left: 0px;"></canvas>
                                    </div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR BADGE BORDER -->
                                <!-- USER AVATAR BADGE CONTENT -->
                                <div class="user-avatar-badge-content">
                                    <!-- HEXAGON -->
                                    <div class="hexagon-dark-26-28" style="width: 26px; height: 28px; position: relative;">
                                        <canvas width="26" height="28" style="position: absolute; top: 0px; left: 0px;"></canvas>
                                    </div>
                                    <!-- /HEXAGON -->
                                </div>
                                <!-- /USER AVATAR BADGE CONTENT -->
                                <!-- USER AVATAR BADGE TEXT -->
                                <p class="user-avatar-badge-text">24</p>
                                <!-- /USER AVATAR BADGE TEXT -->
                            </div>
                            <!-- /USER AVATAR BADGE -->
                        </a>
                        <!-- /USER SHORT DESCRIPTION AVATAR -->
                        <!-- USER SHORT DESCRIPTION TITLE -->
                        <p class="user-short-description-title"><a href="profile-timeline.html">Marina Valentine</a></p>
                        <!-- /USER SHORT DESCRIPTION TITLE -->
                        <!-- USER SHORT DESCRIPTION TEXT -->
                        <p class="user-short-description-text"><a href="#">www.gamehuntress.com</a></p>
                        <!-- /USER SHORT DESCRIPTION TEXT -->
                    </div>
                    <!-- /USER SHORT DESCRIPTION -->
                    <!-- PROFILE HEADER SOCIAL LINKS WRAP -->
                    <div class="profile-header-social-links-wrap">
                        <!-- PROFILE HEADER SOCIAL LINKS -->
                        <div class="tns-outer" id="profile-header-social-links-slider-ow">
                            <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">1 to 7</span>  of 7</div>
                            <div id="profile-header-social-links-slider-mw" class="tns-ovh">
                                <div class="tns-inner" id="profile-header-social-links-slider-iw">
                                    <div id="profile-header-social-links-slider" class="profile-header-social-links  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" style="transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <div class="profile-header-social-link tns-item tns-slide-active" id="profile-header-social-links-slider-item0">
                                            <!-- SOCIAL LINK -->
                                            <a class="social-link facebook" href="#">
                                                <!-- ICON FACEBOOK -->
                                                <svg class="icon-facebook">
                                                    <use xlink:href="#svg-facebook"></use>
                                                </svg>
                                                <!-- /ICON FACEBOOK -->
                                            </a>
                                            <!-- /SOCIAL LINK -->
                                        </div>
                                        <div class="profile-header-social-link tns-item tns-slide-active" id="profile-header-social-links-slider-item1">
                                            <!-- SOCIAL LINK -->
                                            <a class="social-link twitter" href="#">
                                                <!-- ICON TWITTER -->
                                                <svg class="icon-twitter">
                                                    <use xlink:href="#svg-twitter"></use>
                                                </svg>
                                                <!-- /ICON TWITTER -->
                                            </a>
                                            <!-- /SOCIAL LINK -->
                                        </div>
                                        <div class="profile-header-social-link tns-item tns-slide-active" id="profile-header-social-links-slider-item2">
                                            <!-- SOCIAL LINK -->
                                            <a class="social-link instagram" href="#">
                                                <!-- ICON INSTAGRAM -->
                                                <svg class="icon-instagram">
                                                    <use xlink:href="#svg-instagram"></use>
                                                </svg>
                                                <!-- /ICON INSTAGRAM -->
                                            </a>
                                            <!-- /SOCIAL LINK -->
                                        </div>
                                        <div class="profile-header-social-link tns-item tns-slide-active" id="profile-header-social-links-slider-item3">
                                            <!-- SOCIAL LINK -->
                                            <a class="social-link twitch" href="#">
                                                <!-- ICON TWITCH -->
                                                <svg class="icon-twitch">
                                                    <use xlink:href="#svg-twitch"></use>
                                                </svg>
                                                <!-- /ICON TWITCH -->
                                            </a>
                                            <!-- /SOCIAL LINK -->
                                        </div>
                                        <div class="profile-header-social-link tns-item tns-slide-active" id="profile-header-social-links-slider-item4">
                                            <!-- SOCIAL LINK -->
                                            <a class="social-link youtube" href="#">
                                                <!-- ICON YOUTUBE -->
                                                <svg class="icon-youtube">
                                                    <use xlink:href="#svg-youtube"></use>
                                                </svg>
                                                <!-- /ICON YOUTUBE -->
                                            </a>
                                            <!-- /SOCIAL LINK -->
                                        </div>
                                        <div class="profile-header-social-link tns-item tns-slide-active" id="profile-header-social-links-slider-item5">
                                            <!-- SOCIAL LINK -->
                                            <a class="social-link patreon" href="#">
                                                <!-- ICON PATREON -->
                                                <svg class="icon-patreon">
                                                    <use xlink:href="#svg-patreon"></use>
                                                </svg>
                                                <!-- /ICON PATREON -->
                                            </a>
                                            <!-- /SOCIAL LINK -->
                                        </div>
                                        <div class="profile-header-social-link tns-item tns-slide-active" id="profile-header-social-links-slider-item6">
                                            <!-- SOCIAL LINK -->
                                            <a class="social-link discord" href="#">
                                                <!-- ICON DISCORD -->
                                                <svg class="icon-discord">
                                                    <use xlink:href="#svg-discord"></use>
                                                </svg>
                                                <!-- /ICON DISCORD -->
                                            </a>
                                            <!-- /SOCIAL LINK -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /PROFILE HEADER SOCIAL LINKS -->
                        <!-- SLIDER CONTROLS -->
                        <div id="profile-header-social-links-slider-controls" class="slider-controls" aria-label="Carousel Navigation" tabindex="0" style="display: none;">
                            <!-- SLIDER CONTROL -->
                            <div class="slider-control left" aria-controls="profile-header-social-links-slider" tabindex="-1" data-controls="prev">
                                <!-- SLIDER CONTROL ICON -->
                                <svg class="slider-control-icon icon-small-arrow">
                                    <use xlink:href="#svg-small-arrow"></use>
                                </svg>
                                <!-- /SLIDER CONTROL ICON -->
                            </div>
                            <!-- /SLIDER CONTROL -->
                            <!-- SLIDER CONTROL -->
                            <div class="slider-control right" aria-controls="profile-header-social-links-slider" tabindex="-1" data-controls="next">
                                <!-- SLIDER CONTROL ICON -->
                                <svg class="slider-control-icon icon-small-arrow">
                                    <use xlink:href="#svg-small-arrow"></use>
                                </svg>
                                <!-- /SLIDER CONTROL ICON -->
                            </div>
                            <!-- /SLIDER CONTROL -->
                        </div>
                        <!-- /SLIDER CONTROLS -->
                    </div>
                    <!-- /PROFILE HEADER SOCIAL LINKS WRAP -->
                    <!-- USER STATS -->
                    <div class="user-stats">
                        <!-- USER STAT -->
                        <div class="user-stat big">
                            <!-- USER STAT TITLE -->
                            <p class="user-stat-title">930</p>
                            <!-- /USER STAT TITLE -->
                            <!-- USER STAT TEXT -->
                            <p class="user-stat-text">posts</p>
                            <!-- /USER STAT TEXT -->
                        </div>
                        <!-- /USER STAT -->
                        <!-- USER STAT -->
                        <div class="user-stat big">
                            <!-- USER STAT TITLE -->
                            <p class="user-stat-title">82</p>
                            <!-- /USER STAT TITLE -->
                            <!-- USER STAT TEXT -->
                            <p class="user-stat-text">friends</p>
                            <!-- /USER STAT TEXT -->
                        </div>
                        <!-- /USER STAT -->
                        <!-- USER STAT -->
                        <div class="user-stat big">
                            <!-- USER STAT TITLE -->
                            <p class="user-stat-title">5.7k</p>
                            <!-- /USER STAT TITLE -->
                            <!-- USER STAT TEXT -->
                            <p class="user-stat-text">visits</p>
                            <!-- /USER STAT TEXT -->
                        </div>
                        <!-- /USER STAT -->
                        <!-- USER STAT -->
                        <div class="user-stat big">
                            <!-- USER STAT IMAGE -->
                            <img class="user-stat-image" src="img/flag/usa.png" alt="flag-usa">
                            <!-- /USER STAT IMAGE -->
                            <!-- USER STAT TEXT -->
                            <p class="user-stat-text">usa</p>
                            <!-- /USER STAT TEXT -->
                        </div>
                        <!-- /USER STAT -->
                    </div>
                    <!-- /USER STATS -->
                    <!-- PROFILE HEADER INFO ACTIONS -->
                    <div class="profile-header-info-actions">
                        <!-- PROFILE HEADER INFO ACTION -->
                        <p class="profile-header-info-action button secondary"><span class="hide-text-mobile">Add</span> Friend +</p>
                        <!-- /PROFILE HEADER INFO ACTION -->
                        <!-- PROFILE HEADER INFO ACTION -->
                        <p class="profile-header-info-action button primary"><span class="hide-text-mobile">Send</span> Message</p>
                        <!-- /PROFILE HEADER INFO ACTION -->
                    </div>
                    <!-- /PROFILE HEADER INFO ACTIONS -->
                </div>
                <!-- /PROFILE HEADER INFO -->
            </div>
       
        </div>
    </main><!-- .site-main -->
@stop --}}

@extends('frontend.layouts.template')
@section('main')
    <main id="main" class="site-main">
        <div class="site-content">
            <div class="member-menu">
                <div class="container">
                    @include('frontend.user.user_menu')
                </div>
            </div>
            <div class="container">
                <div class="member-wrap">
                    <h1>{{__('Profile Setting')}}</h1>

                    @include('frontend.common.box-alert')

                    <form class="member-profile form-underline" action="{{route('user_profile_update')}}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <h3>{{__('Avatar')}}</h3>
                        <div class="member-avatar">
                            <img id="member_avatar" src="{{getUserAvatar(user()->avatar)}}" alt="Member Avatar">
                            <label for="upload_new">
                                <input id="upload_new" type="file" name="avatar" value="{{__('Upload new')}}" accept="image/*">
                                {{__('Upload new')}}
                            </label>
                        </div>
                        <h3>{{__('Basic Info')}}</h3>
                        <div class="field-input">
                            <label for="name">{{__('Full name')}}</label>
                            <input type="text" id="name" name="name" value="{{user()->name}}" placeholder="{{__('Enter your name')}}">
                        </div>
                        <div class="field-input">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" id="email" name="email" value="{{user()->email}}" disabled>
                        </div>
                        <div class="field-input">
                            <label for="phone">{{__('Phone')}}</label>
                            <input type="tel" id="phone" name="phone_number" value="{{user()->phone_number}}" placeholder="{{__('Enter phone number')}}">
                        </div>
                        <div class="field-input">
                            <label for="facebook">{{__('Facebook')}}</label>
                            <input type="text" id="facebook" name="facebook" value="{{user()->facebook}}" placeholder="{{__('Enter facebook')}}">
                        </div>
                        <div class="field-input">
                            <label for="instagram">{{__('Instagram')}}</label>
                            <input type="text" id="instagram" name="instagram" value="{{user()->instagram}}" placeholder="{{__('Enter instagram')}}">
                        </div>
                        <div class="field-submit">
                            <input type="submit" value="{{__('Update')}}">
                        </div>
                    </form><!-- .member-profile -->

                    <form class="member-password form-underline" action="{{route('user_password_update')}}" method="post">
                        @method('put')
                        @csrf
                        <h3>{{__('Change Password')}}</h3>
                        <div class="field-input">
                            <label for="old_password">{{__('Old password')}}</label>
                            <input type="password" name="old_password" placeholder="{{__('Enter old password')}}" id="old_password" required>
                        </div>
                        <div class="field-input">
                            <label for="new_password">{{__('New password')}}</label>
                            <input type="password" name="password" placeholder="{{__('Enter new password')}}" id="new_password" required>
                        </div>
                        <div class="field-input">
                            <label for="re_new">{{__('Re-new password')}}</label>
                            <input type="password" name="password_confirmation" placeholder="{{__('Enter new password')}}" id="re_new" required>
                        </div>
                        <div class="field-submit">
                            <input type="submit" value="{{__('Save')}}">
                        </div>
                    </form><!-- .member-password -->

                </div><!-- .member-wrap -->
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@stop