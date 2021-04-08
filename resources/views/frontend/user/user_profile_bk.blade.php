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