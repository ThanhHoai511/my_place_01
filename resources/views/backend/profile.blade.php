@extends('backend.master')
@section('main')
    <div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
            <div class="large-10 columns">
                <div class="page-name">
                    <h3 class="left">{{ trans('message.profile') }}</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div id="profile">
            <div class="row">
                <div class="large-4 medium-6 columns">
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
                        <h4>{{ trans('message.ongoing-task') }}</h4>
                        <hr />
                        <span>Something</span>
                        <div class="progress ">
                            <span class="meter yellow-progress" style="width: 40%"></span>
                        </div>
                        <span>Something</span>
                        <div class="progress ">
                            <span class="meter purple-progress" style="width: 10%"></span>
                        </div>
                        <span>Something</span>
                        <div class="progress success">
                            <span class="meter" style="width: 90%"></span>
                        </div>
                        <span>Something</span>
                        <div class="progress alert">
                            <span class="meter" style="width: 50%"></span>
                        </div>
                    </div>
                </div>
                <div class="large-8 medium-6 columns">
                    <div class="profile-info">
                        <div class="white-bg">
                            <div class="custom-panel-heading">
                                <dl class="tabs" data-tab>
                                    <dd class="active"><a href="#panel2-1">{{ trans('message.profile') }}</a></dd>
                                    <dd><a href="#panel2-2">{{ trans('message.account') }}</a></dd>
                                    <dd><a href="#panel2-3">{{ trans('message.password') }}</a></dd>
                                    <dd><a href="#panel2-4">{{ trans('message.security-privacy') }}</a></dd>
                                </dl>
                            </div>
                            <div class="tabs-content">
                                <div class="content active" id="panel2-1">
                                    <h4 class="coral">{{ trans('message.enter-info') }}</h4>
                                    <hr />
                                    {{ HTML::image(config('asset.image_path.avatar') . 'ava.png', 'Logo', ['class' => 'profile-picture']) }}
                                    <a href="#" data-dropdown="drop1" class="secondary button dropdown tiny radius">{{ trans('message.up-img') }}</a><br>
                                    <ul id="drop1" data-dropdown-content class="f-dropdown">
                                        <li><a href="#">{{ trans('message.up-img') }}</a></li>
                                        <li><a href="#">{{ trans('message.change-img') }}</a></li>
                                    </ul>
                                    <br />
                                    <input id="Text2" type="text" placeholder="{{ trans('message.first-name') }}" />
                                    <input id="Text3" type="text" placeholder="{{ trans('message.last-img') }}" />
                                    <input id="Text4" type="text" placeholder="{{ trans('message.website') }}" />
                                    <textarea>{{ trans('message.address') }}</textarea>
                                    <a href="#" class="button small radius coral-bg right">{{ trans('message.save') }}</a>
                                </div>
                                <div class="content" id="panel2-2">
                                    <h4 class="coral">{{ trans('message.setup-acc') }}</h4>
                                    <hr />
                                    <input id="Text5" type="text" placeholder="{{ trans('message.username') }}" />
                                    <input id="Text7" type="text" placeholder="{{ trans('message.email') }}" />
                                    <select id="Select1">
                                        <option>{{ trans('message.language') }}</option>
                                        <option>{{ trans('message.english') }}</option>
                                        <option>{{ trans('message.french') }}</option>
                                    </select>
                                    <a href="#" class="button small radius coral-bg right">{{ trans('message.save') }}</a>
                                </div>
                                <div class="content" id="panel2-3">
                                    <h4 class="coral">{{ trans('message.change-pass') }}</h4>
                                    <hr />
                                    <input id="Password1" type="password" placeholder="{{ trans('message.current-pass') }}" />
                                    <input id="Password2" type="password" placeholder="{{ trans('message.new-pass') }}" />
                                    <input id="Password3" type="password" placeholder="{{ trans('message.confirm-pass') }}" />
                                    <a href="#" class="button small radius coral-bg right">{{ trans('message.save') }}</a>
                                </div>
                                <div class="content" id="panel2-4">
                                    <h4 class="coral">{{ trans('message.security-settings') }}</h4>
                                    <hr />
                                    <dl class="accordion" data-accordion>
                                        <dd>
                                            <a href="#panel1">{{ trans('message.security') }}</a>
                                            <div id="panel1" class="content active">
                                                <div class="check-radio">
                                                    <div class="checkbox">
                                                        <input id="check1" type="checkbox" name="check" value="check1">
                                                        <label for="check1">{{ trans('message.send-pass-change') }}</label>
                                                        <br>
                                                        <input id="check2" type="checkbox" name="check" value="check2">
                                                        <label for="check2">{{ trans('message.ask-forgot-pass') }}</label>

                                                    </div>
                                                </div>
                                            </div>
                                        </dd>
                                        <dd>
                                            <a href="#panel2">{{ trans('message.privacy') }}</a>
                                            <div id="panel2" class="content">
                                                <input id="Checkbox3" type="checkbox" />
                                                {{ trans('message.not-show-email') }}
                                                <br />
                                                <input id="Checkbox4" type="checkbox" />
                                                {{ trans('message.send-newsletter') }}                     
                                                <br />
                                                <input id="Checkbox6" type="checkbox" />{{ trans('message.not-show-contact') }}
                                            </div>
                                        </dd>

                                    </dl>
                                    <br />
                                    <a href="#" class="button small radius coral-bg right">{{ trans('message.save') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
