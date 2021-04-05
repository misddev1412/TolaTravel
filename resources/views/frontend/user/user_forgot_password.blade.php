@extends('frontend.layouts.template')
@section('main')
    <main id="main" class="site-main">
        <div class="page-title page-title--small align-left">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">{{__('My account')}}</h1>
                </div>
            </div>
        </div><!-- .page-title -->

        <div class="site-content">
            <div class="container">
                <div class="member-wrap">
                    @include('frontend.common.box-alert')

                    <form class="member-password form-underline" action="{{route('user_update_password')}}" method="post">
                        @method('put')
                        @csrf
                        <h3>{{__('Reset Password')}}</h3>
                        <div class="field-input">
                            <label for="new_password">{{__('New password')}}</label>
                            <input type="password" name="password" placeholder="{{__('Enter new password')}}" required>
                        </div>
                        <div class="field-input">
                            <label for="re_new">{{__('Re-new password')}}</label>
                            <input type="password" name="password_confirmation" placeholder="{{__('Enter new password')}}" required>
                        </div>
                        <div class="field-submit">
                            <input type="hidden" name="token" value="{{$token}}">
                            <input type="submit" value="{{__('Save')}}">
                        </div>
                    </form><!-- .member-password -->
                </div><!-- .member-wrap -->
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@stop