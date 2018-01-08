@extends('backend.master')
@section('main')
<div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
            <div class="large-10 columns">
                <div class="page-name">
                    <h3 class="left">{{ trans('messages.city-manage') }}</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <section id="general">
            <div class="row">
                <div class="large-6 medium-6 columns">
                    {{ Form::open(['action' => 'CityController@store', 'method' => 'POST']) }}
                        <div class="custom-panel">
                            <div class="custom-panel-heading">
                                <h4>{{ trans('messages.add-city') }}</h4>
                            </div>
                            <div class="custom-panel-body">
                                @include('errors.note')
                                <h5>{{ trans('messages.city-name') }}</h5>
                                {{ Form::text('name', null) }}
                                {{ Form::submit('Submit', ['class' => 'button radius tiny coral-bg button-slide']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="large-6 medium-6 columns">
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.city') }}</h4>
                        </div>
                        <div class="custom-panel-body display-inline">
                            <ul class="slide-list">
                                @foreach ($cities as $value)
                                    <li class="slide-item display-inline city">
                                        <div class="col-md-4"><a href="#">{{ $value->name }}</a></div>
                                        <div class="col-md-4">
                                            {!! Form::open(['action' => ['CityController@edit', $value->id], 'method' =>  'get']) !!}
                                            {!! Form::submit(Lang::get('messages.change'), ['class' => 'button radius tiny coral-bg button-slide']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Form::open(['action' => ['CityController@destroy', $value->id], 'method' =>  'DELETE']) !!}
                                            {!! Form::submit(Lang::get('messages.del'), ['class' => 'button radius tiny blue-bg button-slide']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </section>
    </div>
@stop
