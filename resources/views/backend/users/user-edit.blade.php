@extends('backend.master')
@section('main')
    <div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
            <div class="large-10 columns">
                <div class="page-name">
                    <h3 class="left">{{ trans('messages.profile') }}</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div id="profile">
            <div class="row">
                <div class="large-5 medium-6 columns">
                    <div class="profile-item white-bg border">
                        <h4>Ruth Baby</h4>
                        <hr />
                        <div class="row">
                            <div class="large-6 medium-12 small-12 columns">
                                {{ HTML::image(config('asset.image_path.avatar') . 'ava.png', 'Logo', ['class' => 'profile-picture']) }}
                            </div>
                            <div class="large-6 medium-12 small-12 columns">
                                <p>ruth@gmail.com</p>
                                <p>989-983-7397</p>
                                <p>27 Browns Bay New York</p>
                                <p>Developer</p>
                            </div>
                        </div>
                    </div>

                    <div class="ongoing-task white-bg border">
                        <h4>{{ trans('messages.ongoing-task') }}</h4>
                        <hr />
                        <span>Something</span>
                        <div class="progress ">
                            <span class="meter yellow-progress"></span>
                        </div>
                        <span>Something</span>
                        <div class="progress ">
                            <span class="meter purple-progress"></span>
                        </div>
                        <span>Something</span>
                        <div class="progress success">
                            <span class="meter"></span>
                        </div>
                        <span>Something</span>
                        <div class="progress alert">
                            <span class="meter"></span>
                        </div>
                    </div>
                </div>
                <div class="large-7 medium-6 columns">
                    <div class="profile-info">
                        <div class="white-bg">
                            <div class="custom-panel-heading">
                                <dl class="tabs" data-tab>
                                    <dd class="active"><a href="#profile">{{ trans('messages.profile') }}</a></dd>
                                    <dd><a href="#set-acc">{{ trans('messages.account') }}</a></dd>
                                    <dd><a href="#set-pass">{{ trans('messages.password') }}</a></dd>
                                    <dd><a href="#security">{{ trans('messages.security-privacy') }}</a></dd>
                                </dl>
                            </div>
                            <div class="tabs-content">
                                <div class="content active" id="info">
                                    <h4 class="coral">{{ trans('messages.enter-info') }}</h4>
                                    <hr />
                                    {{ HTML::image(config('asset.image_path.avatar') . 'ava.png', 'Logo', ['class' => 'profile-picture']) }}
                                    <a href="#" data-dropdown="img-dropdown" class="secondary button dropdown tiny radius">{{ trans('messages.up-img') }}</a><br>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">{{ trans('messages.up-img') }}</a></li>
                                        <li><a href="#">{{ trans('messages.change-img') }}</a></li>
                                    </ul>
                                    <br />
                                    <input type="text" placeholder="{{ trans('messages.first-name') }}" />
                                    <input type="text" placeholder="{{ trans('messages.last-img') }}" />
                                    <input type="text" placeholder="{{ trans('messages.website') }}" />
                                    <textarea>{{ trans('messages.address') }}</textarea>
                                    <a href="#" class="button small radius coral-bg right">{{ trans('messages.save') }}</a>
                                </div>
                                <div class="content" id="set-acc">
                                    <h4 class="coral">{{ trans('messages.setup-acc') }}</h4>
                                    <hr />
                                    <input type="text" placeholder="{{ trans('messages.username') }}" />
                                    <input type="text" placeholder="{{ trans('messages.email') }}" />
                                    <select name="lang">
                                        <option>{{ trans('messages.language') }}</option>
                                        <option>{{ trans('messages.english') }}</option>
                                        <option>{{ trans('messages.french') }}</option>
                                    </select>
                                    <a href="#" class="button small radius coral-bg right">{{ trans('messages.save') }}</a>
                                </div>
                                <div class="content" id="set-pass">
                                    <h4 class="coral">{{ trans('messages.change-pass') }}</h4>
                                    <hr />
                                    <input type="password" placeholder="{{ trans('messages.current-pass') }}" />
                                    <input type="password" placeholder="{{ trans('messages.new-pass') }}" />
                                    <input type="password" placeholder="{{ trans('messages.confirm-pass') }}" />
                                    <a href="#" class="button small radius coral-bg right">{{ trans('messages.save') }}</a>
                                </div>
                                <div class="content" id="security">
                                    <h4 class="coral">{{ trans('messages.security-settings') }}</h4>
                                    <hr />
                                    <dl class="accordion" data-accordion>
                                        <dd>
                                            <a href="#info">{{ trans('messages.security') }}</a>
                                            <div id="info" class="content active">
                                                <div class="check-radio">
                                                    <div class="checkbox">
                                                        <input id="email-check" type="checkbox" name="email-check" value="1">
                                                        <label for="email-check">{{ trans('messages.send-pass-change') }}</label>
                                                        <br>
                                                        <input id="pass-check" type="checkbox" name="pass-check" value="1">
                                                        <label for="pass-check">{{ trans('messages.ask-forgot-pass') }}</label>

                                                    </div>
                                                </div>
                                            </div>
                                        </dd>
                                        <dd>
                                            <a href="#privacy">{{ trans('messages.privacy') }}</a>
                                            <div id="privacy" class="content">
                                                <input type="checkbox" />
                                                {{ trans('messages.not-show-email') }}
                                                <br />
                                                <input type="checkbox" />
                                                {{ trans('messages.send-newsletter') }}                     
                                                <br />
                                                <input type="checkbox" />{{ trans('messages.not-show-contact') }}
                                            </div>
                                        </dd>

                                    </dl>
                                    <br />
                                    <a href="#" class="button small radius coral-bg right">{{ trans('messages.save') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
