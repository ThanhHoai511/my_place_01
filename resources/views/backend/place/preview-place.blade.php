@extends('backend.master')
@section('main')
<div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
<section id="general">
    <div class="row">
        <div class="large-6 medium-6 columns">
            {{ Form::open() }}
                <div class="custom-panel">
                    <div class="custom-panel-heading">
                        <h4>{{ trans('messages.edit-place') }}</h4>
                    </div>
                    <div class="custom-panel-body">
                        <h5>{{ trans('messages.place-name') }}</h5>
                        {{ Form::text('name', $place->name,['readonly'=>'true']) }}
                        <h5>{{ trans('messages.choose-dist') }}</h5>
                        <div id="dist-box">
                            {{ Form::text('dist_id', $place->dist->name, ['class' => 'city-select','readonly'=>'true','placeholder' => 'choose a dist']) }}
                        </div>
                        <h5>{{ trans('messages.address') }}</h5>
                        {{ Form::textarea('add', $place->add, ['readonly'=>'true']) }}
                        <h5>{{ trans('messages.open-hour') }}</h5>
                        {{ Form::time('open', $place->open_hour, ['class' => 'time']) }} 
                        <a class="mid-text">{{ trans('messages.to') }}</a>
                        {{ Form::time('close', $place->close_hour, ['class' => 'time']) }}
                        <h5>{{ trans('messages.price-range') }}</h5>
                        {{ Form::text('name', $place->range,['readonly'=>'true']) }}
                        <h5>{{ trans('messages.image') }}</h5>
                        {{ HTML::image(config('asset.image_path.imagereviews') . $place->image, null, ['id' => 'preview']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
</div>
@stop
