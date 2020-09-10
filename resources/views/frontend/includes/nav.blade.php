<!-- Header -->
<header>
    <div class="logo"><a href="javascript:void(0);">Buzzel</a></div>
    <ul class="leftLinks">
        <li class="navLi dropdown">
            <a class="navLi_a dropdown-toggle" href="#" data-toggle="dropdown">Recents</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>

        <li class="navLi dropdown">
            <a class="navLi_a dropdown-toggle" href="#" data-toggle="dropdown">Support</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        @auth
        <li class="navLi"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Route::is('frontend.user.dashboard')) }}">@lang('navs.frontend.dashboard')</a></li>
        @endauth
    </ul>

    <div class="nav_right">
        <div class="searchHeader">
            <i class="fa fa-search"></i>
            <input type="Search" class="headerSearch" placeholder="Search this guide" />
        </div>

        <div class="HeadNotification headIcons">
            <i class="fa fa-bell-o"></i>
        </div>
        <div class="HeadActivity headIcons">
            <i class="fa fa-cog"></i>
        </div>
        @guest
        <div class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Route::is('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></div>

        @if(config('access.registration'))
            <div class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Route::is('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></div>
        @endif
        @endguest
        @auth
            <div class="HeadUserInfo dropdown">
                <div class="userinfoRow dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><span>{{auth()->user()->full_name}}</span></div>

                <div class=" dropdown-menu">
                    <div class="infoEmailAdress">
                        <h3>{{auth()->user()->full_name}}</h3>
                        <h5>{{auth()->user()->email}}</h5>
                    </div>
                    <ul class="HeadMoreLinks">
                        <li><a href="{{ route('frontend.user.account') }}" class="{{ active_class(Route::is('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a></li>
                        @can('view backend')
                        <li>
                            <a href="{{ route('admin.dashboard') }}" >@lang('navs.frontend.user.administration')</a>
                        </li>
                        @endcan
                        <li><a href="javascript:void(0);">Your Purchases</a></li>
                        <li class="spaceNav"></li>
                        <li><a href="javascript:void(0);">Terms of Service</a></li>
                        <li><a href="javascript:void(0);">Privacy Policy</a></li>
                        <li><a href="javascript:void(0);"> <a href="{{ route('frontend.auth.logout') }}">@lang('navs.general.logout')</a></a></li>
                    </ul>
                </div>
            </div>
        @endauth

    </div>
</header>
<!-- Header -->


{{--<div class="container">

    <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="{{env('APP_URL')}}#intro" class="scrollto">Buzzel<img src="{{asset('img/logo.png')}}" alt="" title=""></a>
    </div>
    <nav id="nav-menu-container">
        --}}{{--<a href="{{ route('frontend.index') }}" class="navbar-brand">{{ app_name() }}</a>--}}{{--

        --}}{{--<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">--}}{{--
            --}}{{--<span class="navbar-toggler-icon"></span>--}}{{--
        --}}{{--</button>--}}{{--


            <ul class="nav-menu">
                <li><a href="{{env('APP_URL')}}/#about">Why Buzzel?</a></li>
                <li><a href="{{env('APP_URL')}}/#speakers">Solutions</a></li>
                <li><a href="{{env('APP_URL')}}/#schedule">Pricing</a></li>
                <li><a href="{{env('APP_URL')}}/#venue">Templates</a></li>
                <li><a href="{{env('APP_URL')}}/#hotels">Resources</a></li>
                --}}{{-- @if(config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">@lang('menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})</a>

                        @include('includes.partials.lang')
                    </li>
                @endif --}}{{--

                @auth
                    <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Route::is('frontend.user.dashboard')) }}">@lang('navs.frontend.dashboard')</a></li>
                @endauth

                @guest
                    <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Route::is('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>

                    @if(config('access.registration'))
                        <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Route::is('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                            @can('view backend')
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                            @endcan

                            <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Route::is('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                            <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                        </div>
                    </li>
                @endguest

                <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Route::is('frontend.contact')) }}">@lang('navs.frontend.contact')</a></li>
            </ul>

    </nav>
</div>--}}
