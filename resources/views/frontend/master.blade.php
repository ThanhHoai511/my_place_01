<!DOCTYPE html>
<html>
    <head>
        <title>myplaces</title>
        <base href="{{ asset('') }}"/>
        {{ Html::style('assets/bootstrap/dist/css/bootstrap.css') }}
        {{ Html::style('assets/bootstrap/dist/css/bootstrap-theme.css') }}
        {{ Html::style('assets/bootstrap/dist/css/bootstrap.min.css') }}
        {{ Html::style('css/application.css') }}
        {{ Html::style('assets/slick-carousel/slick/slick.css') }}
        {{ Html::style('assets/slick-carousel/slick/slick-theme.css') }}
        {{ Html::style('assets/font-awesome/css/font-awesome.min.css') }}
        {{ Html::script('assets/jquery/dist/jquery.min.js') }}
        {{ Html::script('assets/bootstrap/dist/js/bootstrap.min.js') }}
        {{ Html::script('assets/slick-carousel/slick/slick.min.js') }}
        {{ Html::script('assets/jscroll/jquery.jscroll.js') }}
        {{ Html::script('assets/sweetalert2/dist/sweetalert2.all.min.js') }}
    </head>
    <body>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="head-navbar">
            @include('frontend.layout.header')
        </nav>
        <div class="container">
            @include('frontend.layout.left-side-bar')
            @include('frontend.layout.right-slide')
            <div class="col-md-6 col-md-offset-2 padding0">
                @if(Session::has('pass'))
                    <p class="alert alert-success">
                        {{ session('pass') }}
                    </p>
                @endif
                @if(Session::has('error'))
                    <p class="alert alert-danger">
                        {{ session('error') }}
                    </p>
                @endif
                @yield('main')
            </div>
        </div>
        @include('frontend.layout.footer')
        @section('contentJs')
        {{ Html::script('assets/ckeditor/ckeditor.js') }}
        {{ Html::script('assets/jquery/dist/jquery.min.js') }}
        {{ Html::script('js/myscripts.js') }}
        {{ Html::script('js/Home/scollbar.js') }}
        {{ Html::script('js/Home/seemore.js') }}
        {{ Html::script('js/searchmap.js') }}
        {{ Html::script('js/googlemap.js') }}
    </body>
    @yield('script')
</html>
