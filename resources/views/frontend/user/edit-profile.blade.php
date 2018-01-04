@extends('frontend.master')
@section('main')
    <div class="block">
        <div class="field">
            <h2>{{ trans('messages.edit-profile') }}</h2>
        </div>
        {{ Form::open() }}
            <div class="field">
                {{ Form::label('images', trans('messages.avatar'), ['class' => 'label-edit']) }}
                {{ Form::file('images', ['class' => 'input-edit', 'placeholder' => trans('messages.email'), 'required' => 1, 'id' => 'imgInp']) }}
                {{-- {{ HTML::image('#', null, ['id' => 'preview']) }} --}}
                <img id="preview" src="#"/>
            </div>
            <div class="field">
                {{ Form::label('email', trans('messages.email'), ['class' => 'label-edit']) }}
                {{ Form::email('email', null, ['class' => 'input-edit', 'placeholder' => trans('messages.email')]) }}
            </div>
            <div class="field">
                {{ Form::label('name', trans('messages.name'), ['class' => 'label-edit']) }}
                {{ Form::text('name', null, ['class' => 'input-edit', 'placeholder' => trans('messages.name')]) }}
            </div>
            <div class="field">
                {{ Form::label('address', trans('messages.address'), ['class' => 'label-edit']) }}
                {{ Form::textarea('address', null, ['class' => 'input-edit']) }}
            </div>
            <div class="field">
                {{ Form::label('phone', trans('messages.phone'), ['class' => 'label-edit']) }}
                {{ Form::text('phone', null, ['class' => 'input-edit', 'placeholder' => trans('messages.leave-comment')]) }}
            </div>
            <div class="field">
                {{ Form::label('dob', trans('messages.dob'), ['class' => 'label-edit']) }}
                {{ Form::date('DOB', null, ['class' => 'input-edit']) }}
            </div>
            <div class="field">
                {{ Form::label('password', trans('messages.password'), ['class' => 'label-edit']) }}
                {{ Form::password('password', ['class' => 'input-edit', 'id' => 'pass']) }}
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
                    {{ Form::button('<i class="fa fa-check fa-lg"></i>' . trans('messages.update'), array('class' => 'btn btn-primary btn2 width100', 'data-toggle' => 'dropdown')) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@stop
