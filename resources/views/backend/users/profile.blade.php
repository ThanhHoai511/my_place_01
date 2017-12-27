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
                <div class="large-4 medium-6 columns">
                    <div class="profile-item white-bg border">
                        <h4>{{ $user->name }}</h4>
                        <hr />
                        <div class="row">
                            <div class="large-6 medium-12 small-12 columns">
                                {{ HTML::image(config('asset.image_path.upload') . $user->avatar) }}
                            </div>
                            <div class="large-6 medium-12 small-12 columns">
                                <p>{{ $user->email }}</p>
                                <p>{{ $user->phone }}</p>
                                <p>{{ $user->add }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="ongoing-task white-bg border">
                        <h4>{{ trans('messages.ongoing-task') }}</h4>
                        <hr />
                        <span>{{ trans('messages.something') }}</span>
                        <div class="progress ">
                            <span class="meter yellow-progress" style="width: 40%"></span>
                        </div>
                        <span>{{ trans('messages.something') }}</span>
                        <div class="progress ">
                            <span class="meter purple-progress" style="width: 10%"></span>
                        </div>
                        <span>{{ trans('messages.something') }}</span>
                        <div class="progress success">
                            <span class="meter" style="width: 90%"></span>
                        </div>
                        <span>{{ trans('messages.something') }}</span>
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
                                    <dd class="active"><a href="#panel2-1">{{ trans('messages.profile') }}</a></dd>
                                    <dd><a href="#panel2-3">{{ trans('messages.password') }}</a></dd>
                                    <dd><a href="#panel2-4">{{ trans('messages.security-privacy') }}</a></dd>
                                </dl>
                            </div>
                            <div class="tabs-content">
                                <div class="content active" id="panel2-1">
                                    <h4 class="coral">{{ trans('messages.enter-info') }}</h4>
                                    <hr />
                                    {{ Form::open(['action' => ['UserController@update', $user->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                                    {{ HTML::image($user->pathImage) }}
                                    {{ Form::file('avatar', ['class' => 'secondary button dropdown tiny radius']) }}
                                    {{ Form::text('name', $user->name, array('id' => 'Text2')) }}
                                    {{ Form::text('add', $user->add, array('id' => 'Text3')) }}
                                    {{ Form::text('phone', $user->phone, array('id' => 'Text4')) }}
                                    {{ Form::text('email', $user->email, array('id' => 'Text5', 'readonly' => 'true')) }}
                                </div>
                                <div class="content" id="panel2-3">
                                    <h4 class="coral">{{ trans('messages.change-pass') }}</h4>
                                    <hr />
                                    {{ Form::password('newpassword', array('id' => 'Password2', 'placeholder' => Lang::get('messages.new-pass'), 'required' => 'true')) }}
                                    {{ Form::password('confirmpassword', array('id' => 'Password3', 'placeholder' => Lang::get('messages.confirm-pass'), 'required' => 'true')) }}
                                </div>
                                <div class="content" id="panel2-4">
                                    <h4 class="coral">{{ trans('messages.security-settings') }}</h4>
                                    <hr />
                                    <dl class="accordion" data-accordion>
                                        <dd>
                                            <a href="#panel1">{{ trans('messages.security') }}</a>
                                            <div id="panel1" class="content active">
                                                <div class="check-radio">
                                                    <div class="checkbox">
                                                        {{ Form::checkbox('check', config('checkbox.checktrue'), null, ['id' => 'check1']) }}
                                                        <label for="check1">{{ trans('messages.send-pass-change') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>
                                    <br />
                                </div>
                            </div>
                            {{ Form::submit('Submit', ['class' => 'button small radius coral-bg right']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
