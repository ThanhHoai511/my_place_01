@extends('frontend.master')
@section('main')
<div class="block">
        <div class="field">
            <h2>{{ trans('messages.new-collection') }}</h2>
        </div>
        {{ Form::open(['action' => ['CollectionController@store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
	        {{ Form::hidden('review_id', $review->id) }}
            <div class="field">
            	{{ trans('messages.add') }} <a href="#"><b>{{ $review->submary }}</b></a> {{ trans('messages.into-new-col') }}
            </div>
            <div class="field">
                {{ Form::label('name', trans('messages.collection-name'), ['class' => 'label-edit']) }}
                {{ Form::text('name', null, ['class' => 'input-edit', 'placeholder' => trans('messages.name')]) }}
            </div>
            <div class="actions row">
                <div class="col-md-3 float-right">
                    <a href="#" class="btn btn-primary btn2 width100">
                        <i class="fa fa-arrow-left fa-lg"></i>{{ trans('messages.back') }}
                    </a>
                </div>
                <div class="col-md-3 float-right">
                    {{ Form::submit(trans('messages.add'), ['class' => 'btn btn-primary btn2 width100']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@stop
