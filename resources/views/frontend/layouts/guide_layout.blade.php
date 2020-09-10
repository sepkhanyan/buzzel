<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Guide Book')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->

        {{--{{ style(mix('css/frontend.css')) }}--}}
        {{style('lib/bootstrap/css/bootstrap.css')}}
        {{style('lib/bootstrap/css/bootstrap-datepicker.min.css')}}
        {{style('lib/font-awesome/css/font-awesome.min.css')}}
        {{style('lib/animate/animate.css')}}
        {{style('lib/venobox/venobox.css')}}
        {{style('lib/owlcarousel/assets/owl.carousel.css')}}
        {{style('css/frontend/style.css')}}
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAddazTu6MeLaef_NguCtT7SC-f56q1Kus&libraries=places"></script>



        @stack('after-styles')
    </head>
    <body>
        @include('includes.partials.read-only')

        <div id="app">
            <div class="FlexContainer">
                @include('includes.partials.messages')
                <div class="mainContentArea">
                    @yield('content')
                </div>
            </div>

        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')

        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script('lib/drag.js') !!}
        {!! script('lib/popper.min.js') !!}
        {!! script('lib/wow/wow.min.js') !!}
        {!! script(mix('js/frontend.js')) !!}
        {!! script('lib/bootstrap/js/bootstrap-datepicker.min.js') !!}

        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
