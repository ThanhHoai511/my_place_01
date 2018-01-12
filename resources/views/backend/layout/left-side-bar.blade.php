<div class="no-padding">
    <div class="large-2 medium-12 small-12 columns">
        <ul class="side-nav">
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="flaticon-profile4"></i>
                    {{ trans('messages.profile') }}
                </a>
            </li>
            <li>
                <a href="{{ route('category.index') }}">
                    <i class="flaticon-businessman22"></i>
                    {{ trans('messages.category') }}
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="flaticon-mailbox10"></span>
                    {{ trans('messages.slide') }}
                </a>
            </li>
            <li class="dropdown">
			    <ul>
                    <li>
                        <dl class="accordion" data-accordion="myAccordionGroup">
                            <dd>
                                <a class="place-expand">
                                    <i class="flaticon-forms"></i>
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
                                            <a href="editor.html">{{ trans('messages.place') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </dd>
                        </dl>
                    </li>
                </ul>
            </li>
            <li><a href="#"><span class="flaticon-mailbox10"></span>{{ trans('messages.slide') }}</a></li>
            @if (!$countReport)
                <li><a href="{{ action('ReportController@index') }}"><span></span>{{ trans('messages.report') }}</a></li>
            @else
                <li><a href="{{ action('ReportController@index') }}"><span class="count-report-news">{{ $countReport }}</span>{{ trans('messages.report') }}</a></li>
            @endif
            <li>
                <a href="{{ route('logout') }}">
                    <i class="flaticon-incoming4"></i>
                    {{ trans('messages.logout') }}
                </a>
            </li>
        </ul>
    </div>
</div>
