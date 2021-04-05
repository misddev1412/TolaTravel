@extends('frontend.layouts.template_landing')
@php
    $landing_banner = "style=background-image:url(/assets/images/bg-app.png)";
    $landing_banner2 = "style=background-image:url(/assets/images/ld-banner-02.png)";
@endphp
@section('main')
    <body class="template-coming-soon">
    <div id="wrapper">
        <header id="header" class="site-header">
            <div class="container">
                <div class="site__brand">
                    <a title="Logo" href="{{route('home')}}" class="site__brand__logo"><img src="{{asset('assets/images/assets/logo.png')}}" alt="Golo"></a>
                </div><!-- .site__brand -->
            </div><!-- .container-fluid -->
        </header><!-- .site-header -->

        <main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="cs-info">
                            <h1>Under Construction!</h1>
                            <p>To make somethings right we need some time to rebuild.  Get notified when we are done.</p>
                            <form action="#" class="site-banner__search cs-newletter">
                                <div class="site-banner__search__field">
									<span class="site-banner__search__icon">
										<i class="las la-arrow-right"></i>
									</span><!-- .site-banner__search__icon -->
                                    <input class="site-banner__search__input" type="text" name="s" placeholder="Email address">
                                </div><!-- .site-banner__search__input -->
                            </form><!-- .site-banner__search -->
                        </div><!-- .cs-info -->
                    </div>
                    <div class="col-md-6">
                        <div class="cs-thumb">
                            <img src="{{asset('assets/images/cs-thumb.svg')}}" alt="Coming Soon">
                        </div><!-- .cs-thumb -->
                    </div>
                </div>
            </div>
        </main><!-- .site-main -->

        <footer id="footer" class="footer">
            <div class="container">
                <div class="footer-socials">
                    <ul>
                        <li>
                            <a title="Facebook" href="#">
                                <i class="lab la-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a title="Instagram" href="#">
                                <i class="la la-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a title="Twitter" href="#">
                                <i class="lab la-twitter-square"></i>
                            </a>
                        </li>
                        <li>
                            <a title="Youtube" href="#">
                                <i class="lab la-youtube-square"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div><!-- .container -->
        </footer><!-- site-footer -->
    </div><!-- #wrapper -->
    </body>
@stop