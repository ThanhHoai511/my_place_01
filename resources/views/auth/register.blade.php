@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3>{{ trans('messages.register') }}</h3>

                <div class="panel-body">
                    {{ Form::open(array('route' => 'register', 'class' => 'form-horizontal')) }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', Lang::get('messages.name'), array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::text('name', old('username'), ['class' => 'form-control', 'id' => 'name', 'required' => 'true', 'autofocus' => 'autofocus']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', trans('messages.email'), array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'true']) }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('add') ? ' has-error' : '' }}">
                            {{ Form::label('add', trans('messages.address'), array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::text('add', old('username'), ['class' => 'form-control', 'id' => 'name', 'required' => 'true', 'autofocus' => 'autofocus']) }}

                                @if ($errors->has('add'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('add') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            {{ Form::label('phone', trans('messages.phone'), array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::text('phone', old('username'), ['class' => 'form-control', 'id' => 'phone', 'required' => 'true', 'autofocus' => 'autofocus']) }}

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('add') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            {{ Form::label('birthday', trans('messages.dob'), array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                            {{ Form::date('birthday', \Carbon\Carbon::now()) }}

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('add') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{ Form::label('password', trans('messages.password'), array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'true']) }}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password-confirm', Lang::get('messages.confirmpassword'), array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'required' => 'true']) }}
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div><label for="check1" class="checkbox-label">{{ trans('messages.send-pass-change') }}</label>
                            {{ Form::checkbox('check', config('checkbox.checktrue'), null, ['class' => 'checkbox', 'id' => 'check1']) }}
                            </div>
                        </div>
                        {{ Form::hidden('invisible', trans('messages.registersuccess'), array('id' => 'registersuccess_id')) }}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit(Lang::get('messages.register'), array('class' => 'btn b3b3ff-bg log-btn','id' => 'log-btn-id')) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('adminJs')
    {{ Html::script('js/Home/alertregister.js') }}
@endsection
