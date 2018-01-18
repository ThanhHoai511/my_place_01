@extends('frontend.master')
@section('main')
    <div class="block">
        <div class="field">
            <h2>{{ trans('messages.edit-profile') }}</h2>
        </div>
        {{ Form::open(['action' => ['UserController@update', $user->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
            <div class="field idea-img">
                {{ Form::label('images', trans('messages.avatar'), ['class' => 'label-edit']) }}
                {{ Form::file('avatar', ['class' => 'input-edit', 'placeholder' => trans('messages.email'), 'id' => 'imgInp']) }}
                {{ HTML::image(config('asset.image_path.upload') . $user->avatar, null, ['id' => 'preview']) }}
            </div>
            <div class="field">
                {{ Form::label('email', trans('messages.email'), ['class' => 'label-edit']) }}
                {{ Form::email('email', $user->email, ['class' => 'input-edit', 'placeholder' => trans('messages.email')]) }}
            </div>
            <div class="field">
                {{ Form::label('name', trans('messages.name'), ['class' => 'label-edit']) }}
                {{ Form::text('name', $user->name, ['class' => 'input-edit', 'placeholder' => trans('messages.name')]) }}
            </div>
            <div class="field">
                {{ Form::label('address', trans('messages.address'), ['class' => 'label-edit']) }}
                {{ Form::textarea('add', $user->add, ['class' => 'input-edit']) }}
            </div>
            <div class="field">
                {{ Form::label('phone', trans('messages.phone'), ['class' => 'label-edit']) }}
                {{ Form::text('phone', $user->phone, ['class' => 'input-edit', 'placeholder' => trans('messages.leave-comment')]) }}
            </div>
            <div class="field">
                {{ Form::label('dob', trans('messages.dob'), ['class' => 'label-edit']) }}
                {{ Form::date('dateofbirth', $user->dateofbirth, ['class' => 'input-edit']) }}
            </div>
            <div class="field">
                {{ Form::label('password', trans('messages.new-pass'), ['class' => 'label-edit']) }}
                {{ Form::password('newpassword', ['class' => 'input-edit', 'id' => 'pass']) }}
            </div>  
            <div class="field">
                {{ Form::label('password-confirm', trans('messages.password-confirm'), ['class' => 'label-edit']) }}
                {{ Form::password('password_confirmation', ['class' => 'input-edit', 'id' => 'pwd']) }}
            </div>
            <div class="field">
                {{ Form::label('current-pass', trans('messages.current-pass'), ['class' => 'label-edit']) }}
                {{ Form::password('current_password', ['class' => 'input-edit', 'placeholder' => trans('messages.need-current-pass')]) }}
            </div>
            <div class="actions row">
                <div class="col-md-3 float-right">
                    <a href="#" class="btn btn-primary btn2 width100">
                        <i class="fa fa-arrow-left fa-lg"></i>{{ trans('messages.back') }}
                    </a>
                </div>
                <div class="col-md-3 float-right">
                    {{ Form::submit(trans('messages.update'), ['class' => 'btn btn-primary btn2 width100']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@stop
