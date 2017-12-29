<!DOCTYPE html>
<html>
    <head>
        <title>myplaces</title>
        {{ Html::style('assets/bootstrap/dist/css/bootstrap.css') }}
        {{ Html::style('assets/bootstrap/dist/css/bootstrap-theme.css') }}
        {{ Html::style('assets/bootstrap/dist/css/bootstrap.min.css') }}
        {{ Html::style('css/application.css') }}
        {{ Html::style('assets/slick-carousel/slick/slick.css') }}
        {{ Html::style('assets/font-awesome/css/font-awesome.min.css') }}
        {{ Html::script('assets/jquery/dist/jquery.min.js') }}
        {{ Html::script('assets/bootstrap/dist/js/bootstrap.min.js') }}
        {{ Html::script('assets/slick-carousel/slick/slick.min.js') }}
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="head-navbar">
            @include('frontend.layout.header')
        </nav>
        <div class="container">
            @include('frontend.layout.left-side-bar')
            @include('frontend.layout.right-slide')
            <div class="col-md-6 col-md-offset-2 padding0">
                <p class="alert alert-success">
                    Notice aa
                </p>
                <p class="alert alert-danger">
                    alert
                </p>

                @yield('main')
            </div>
        </div>
        @include('frontend.layout.footer')
        {{ Html::script('assets/jquery/dist/jquery.min.js') }}
        {{ Html::script('js/myscripts.js') }}
    </body>
    @yield('script')
</html>
