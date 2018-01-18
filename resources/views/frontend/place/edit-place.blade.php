@extends('frontend.master')
@section('main')
<div class="block">
        {{ Form::open(['action' => ['PlaceController@uploadPlace', $place->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <div id="error_explanation">
            <h2>
               {{ trans('messages.edit-place') }}
            </h2>
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.place'), array('class' => 'mylabel')) }}
            {{ Form::text('name', $place->name, ['id' => 'searchPlace', 'required' => 'true', 'readonly' => 'true']) }}
            <div id="suggesstion-box"></div>
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.place'), array('class' => 'mylabel')) }}
            {{ Form::text('add', $place->add, ['id' => 'searchPlace', 'required' => 'true', 'readonly' => 'true']) }}
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.choose-city'), array('class' => 'mylabel')) }}
            {{ Form::select('city', $cityId, null,['class' => 'form-control']) }}
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.choose-dist'), array('class' => 'mylabel')) }}
            {{ Form::select('dist_id', $distId, null, ['class' => 'form-control']) }}
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.open-hour'), array('class' => 'mylabel')) }}
            {{ Form::time('open', $place->open_hour, ['class' => 'form-control']) }} 
        </div>
        <a class="mid-text">{{ trans('messages.to') }}</a>
        <div class="field">
            {{ Form::label('place', trans('messages.open-hour'), array('class' => 'mylabel')) }}
            {{ Form::time('close', $place->open_hour, ['class' => 'form-control']) }} 
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.price-range'), array('class' => 'mylabel')) }}
            {{ Form::number('price_from', $range[0], ['class' => 'form-control']) }}
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.to'), array('class' => 'mylabel')) }}
            {{ Form::number('price_to', null, ['class' => 'form-control']) }}
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.choose-img'), array('class' => 'mylabel')) }}
            {{ Form::file('image', ['class' => 'input-edit', 'placeholder' => trans('messages.email'), 'id' => 'imgInp']) }}
            {{ HTML::image($place->image_place, null, ['id' => 'preview']) }}
        </div>
        <div class="row actions">
            {{ Form::submit(trans('messages.send'), ['id' => 'upload', 'class' => 'upload btn btn-primary btn2 col-md-3', 'id' => 'submit_id']) }}
        </div>
    {{ Form::close() }}
</div>
@stop
