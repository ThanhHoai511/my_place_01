<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
        {{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'logo-img']) }}
        myplaces</a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a class="head-item-1st active" href="{{ action('HomeController@index') }}">{{ trans('messages.home') }}</a></li>
            <li><a class="head-item-2nd" href="/pages/info">{{ trans('messages.personal') }}</a></li>
        </ul>
        <div class="input-group stylish-input-group">
                    <input type="text" class="form-control"  placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
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
