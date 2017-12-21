<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }}</title>
    {{ Html::style('assets/foundation/css/foundation.css') }}
    {{ Html::style('assets/foundation-icon-fonts/foundation-icons.css') }}
    <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
    <link href="{{ URL::asset('/css/flat-icon/flaticon.css') }}" rel="stylesheet" />
    @yield('css')
</head>
<body>
    <div class="row full-width wrapper">
        <div class="large-12 columns content-bg">
            @include('backend.layout.top-menu')
            <div class="row">
                @include('backend.layout.left-side-bar')
                @yield('main')
            </div>
        </div>
    </div>
    {{ Html::script('assets/modernizr/modernizr.js') }}
    {{ Html::script('assets/jquery/dist/jquery.js') }}
    {{ Html::script('assets/foundation/js/foundation/foundation.js') }}
    @yield('script')
</body>
</html>
