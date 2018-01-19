<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse">
        <div class="input-group stylish-input-group head-bar padding0">
        <ul class="nav navbar-nav">
            <li><a class="navbar-brand" href="{{ route('home') }}">
        {{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'logo-img']) }}
        myplaces</a></li>
            <li><a class="head-item-1st active" href="{{ action('HomeController@index') }}">{{ trans('messages.home') }}</a></li>
            <li><a class="head-item-2nd" href="/pages/info">{{ trans('messages.personal') }}</a></li>
        </ul>
        {{ Form::open(['action' => ['SearchController@searchKey'], 'method' => 'get']) }}
            <div class="input-group stylish-input-group search-bar">
                {{ Form::text('key', null, ['class' => 'form-control', 'placeholder' => trans('search')]) }}
                <span class="input-group-addon">
                    {{ Form::button('<span class="glyphicon glyphicon-search"></span>', ['type' => 'submit'] )  }}
                </span>
            </div>
        {{ Form::close() }}
        <p class="navbar-text pull-right color-white">
        <div class="col-md-1 dropdown head-dropdown float-right">
            @if(Auth::check())
            <div class="dropdown color-white float-right">
                <button class="btn btn-secondary dropdown-toggle color-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        {{ HTML::image(Auth::user()->PathImage) }}
                    <strong>
                    {{ Auth::user()->name}}
                    </strong>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="head-dropdown-ul">
                        <li>
                            <a href="{{ route('editprofile', Auth::user()->id) }}">{{ trans('messages.edit-profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('mywall', Auth::user()->id) }}">{{ trans('messages.edit-mywall') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('mycollection', Auth::user()->id) }}">{{ trans('messages.my-collection') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">{{ trans('messages.logout') }}</a>
                        </li>
                        @if (Auth::user()->level == config('const.roleAdmin'))
                            <li>
                                <a href="{{ route('adminPage') }}">{{ trans('messages.admin-page') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            @else
            <a class="navbar-brand" href="{{ route('login') }}">{{ trans('messages.loginhome') }}</a>
            @endif
        </div>
        </p>
    </div>
</div>
