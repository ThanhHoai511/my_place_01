@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('messages.register') }}</div>

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
                            {{ Form::label('email', Lang::get('messages.email'), array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'true']) }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{ Form::label('password', Lang::get('messages.password'), array('class' => 'col-md-4 control-label')) }}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::button(Lang::get('messages.register'), array('class' => 'btn btn-primary')) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
