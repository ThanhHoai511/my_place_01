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
            <div class="dropdown-cate">
                <button class="dropbtn-cate">{{ trans('messages.category') }}</button>
                <div class="dropdown-content-parent">
                    @foreach ($cateParent as $value)
                        <li class="parent">
                            <a href="{{ route('cateShow', $value->id) }}">{{ $value->name }}</a>
                            @if (isset($cateChild[$value->id]))
                                <ul class="dropdown-level-2">
                                    @foreach ($cateChild[$value->id] as $item)
                                        <li><a href="{{ route('cateShow', $item->id) }}">{{ $item->name }} - {{ $item->type_concept }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                </div>
            </div>
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
        <div class="dropdown head-dropdown float-right">
            @if(Auth::check())
            <div class="dropdown color-white float-right">
                <button class="btn btn-secondary dropdown-toggle color-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        {{ HTML::image(Auth::user()->PathImage, null, ['class' => 'ava-img']) }}
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
            <a class="navbar-brand" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true">{{ trans('messages.loginhome') }}</i></a>
            @endif
        </div>
        @if(Auth::check())
            <div class="notification text-center dropdown head-dropdown">
                <button class="btn btn-secondary dropdown-toggle color-white" type="button" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                    <div class="noti-count"><a>4</a></div>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul>
                        <li class="new-noti">
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'float-left']) }}</div>
                                <div>dddddddd</div>
                            </a>
                        </li>
                        <li class="see-div text-center">
                            <a href="#" class="see-more">Xem tất cả</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
        </p>
    </div>
</div>
