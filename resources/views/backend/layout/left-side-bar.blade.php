<div class="no-padding">
    <div class="large-2 medium-12 small-12 columns">
        <ul class="side-nav">
            <li>
                <a class="padding-0" href="{{ route('users.index') }}">
                    <div class="col-md-4"><i class="flaticon-profile4"></i></div>
                    {{ trans('messages.profile') }}
                </a>
            </li>
            <li>
                <a class="padding-0" href="{{ route('category.index') }}">
                    <div class="col-md-4"><i class="flaticon-businessman22"></i></div>
                    {{ trans('messages.category') }}
                </a>
            </li>
            <li class="dropdown">
			    <ul>
                    <li>
                        <dl class="accordion" data-accordion="myAccordionGroup">
                            <dd>
                                <a class="place-expand">
                                    <div class="col-md-4">
                                        <i class="flaticon-forms"></i>
                                    </div>
                                        {{ trans('messages.place') }}
                                </a>
                                <div id="panel1c" class="content">
                                    <ul>
                                        <li>
                                            <a href="{{ asset('/admin/city') }}">{{ trans('messages.city') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('/admin/district') }}">{{ trans('messages.dist') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('/admin/place') }}">{{ trans('messages.place') }}</a>
                                        </li>
                                        @if (!$countPlace)
                                            <li><a href="{{ action('PlaceController@listPlace') }}"><span></span>{{ trans('messages.placepending') }}</a></li>
                                        @else
                                            <li><a href="{{ action('PlaceController@listPlace') }}">{{ trans('messages.placepending') }}<span class="count-report-news">{{ $countPlace }}</span></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </dd>
                        </dl>
                    </li>
                </ul>
            </li>
            <li>
                <a class="padding-0" href="#">
                    <div class="col-md-4">
                        <span class="flaticon-mailbox10"></span>
                    </div>
                    {{ trans('messages.slide') }}
                </a>
            </li>
            @if (!$countReport)
                <li>
                    <a class="padding-0" href="{{ action('ReportController@index') }}">
                        <div class="col-md-4">
                            <i class="fa fa-file-excel-o report" aria-hidden="true"></i>
                            <span></span>
                        </div>
                        {{ trans('messages.report') }}
                    </a>
                </li>
            @else
                <li>
                    <a class="padding-0" href="{{ action('ReportController@index') }}">
                        <div class="col-md-4">
                            <i class="fa fa-circle report"></i>
                            <span class="count-report-news">{{ $countReport }}</span>
                        </div>
                        {{ trans('messages.report') }}
                    </a>
                </li>
            @endif
            <li>
                <a class="padding-0" href="{{ route('logout') }}">
                    <div class="col-md-4">
                        <i class="flaticon-incoming4"></i>
                    </div>
                    {{ trans('messages.logout') }}
                </a>
            </li>
        </ul>
    </div>
</div>
