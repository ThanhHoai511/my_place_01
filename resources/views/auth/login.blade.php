@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default panel-login">
                <h3>{{ trans('messages.login') }}</h3>

                <div class="panel-body">
                    {{ Form::open(array('route' => 'login', 'class' => 'form-horizontal')) }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', Lang::get('messages.email'), array('class' => 'col-md-2 control-label')) }}

                            <div class="col-md-10">
                                {{ Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'true', 'autofocus' => 'autofocus']) }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{ Form::label('password', Lang::get('messages.password'), array('class' => 'col-md-2 control-label')) }}

                            <div class="col-md-10">
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'true']) }}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    {{ Form::labelWithHTML( Lang::get('messages.remember')) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                {{ Form::submit( Lang::get('messages.login'), array('class' => 'btn b3b3ff-bg log-btn')) }}

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ trans('messages.forgot') }}
                                </a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
