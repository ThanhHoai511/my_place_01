<div class="col-md-2" id="left-menu">
    <ul>
        <li class="left-item left-item-active fst">
        	<i class="fa fa-home fa-lg icon"></i>
        	<a href="{{ action('HomeController@index') }}">{{ trans('messages.home') }}</a>
        </li>
        @if(Auth::check())
        <li class="left-item crt">
        	<i class="fa fa-plus fa-lg icon"></i>
        	<a href="{{ action('ReviewController@create') }}">{{ trans('messages.create-review') }}</a>
        </li>
        @endif
        <li class="left-item crt">
            <i class="fa fa-star fa-lg icon" aria-hidden="true"></i>
        	<a href="{{ action('PlaceController@topWeek') }}">{{ trans('messages.top') }}</a>
        </li>
    </ul>
</div>
