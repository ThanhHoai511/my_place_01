@extends('frontend.master')
@section('main')
<div class="block">
        {{ Form::open(['action' => 'ReviewController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <div id="error_explanation">
            <h2>
               {{ trans('messages.create-review') }}
            </h2>
        </div>
        <div class="field">
            {{ Form::hidden('place_id', null, ['id' => 'place_id']) }}
            {{ Form::hidden('service_rate', null, ['id' => 'service_rate_id']) }}
            {{ Form::hidden('quality_rate', null, ['id' => 'quality_rate_id']) }}
            {{ Form::label('place', trans('messages.place'), array('class' => 'mylabel')) }}
            {{ Form::text('submary', null, ['id' => 'searchPlace', 'required' => 'true']) }}
            <div id="suggesstion-box"></div>
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.short-description'), array('class' => 'mylabel')) }}
            {{ Form::text('title', null, ['id' => 'submary', 'required' => 'true']) }}
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.your-review'), array('class' => 'mylabel')) }}
            {{ Form::textarea('content', null, ['id' => 'editor1', 'required' => 'true']) }}
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.date-visit'), array('class' => 'mylabel')) }}    
            {{ Form::date('timewrite', \Carbon\Carbon::now()) }}
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.your-rate'), array('class' => 'mylabel')) }}
            {{ Form::hidden('rateservice', null, ['id' => 'rateservice_id', 'required' => 'true']) }}
            {{ Form::hidden('ratequality', null, ['id' => 'ratequality_id', 'required' => 'true']) }}
            <section class='rating-widget'>
                <table>
                    <tr>
                        <td>{{ trans('messages.service') }}</td>
                        <td>
                            <div class='rating-stars'>
                            <ul class='stars' id='stars-service'>
                                <li class='star' title={{ trans('messages.poor') }} data-value='1' value = '1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title={{ trans('messages.fair') }} data-value='2' value = '2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title={{ trans('messages.good') }} data-value='3' value = '3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title={{ trans('messages.excellent') }} data-value='4' value = '4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title={{ trans('messages.wow') }} data-value='5' value = '5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('messages.quality') }}</td>
                        <td>
                            <div class='rating-stars'>
                            <ul class='stars' id='stars-quality' >
                                <li class='star' title={{ trans('messages.poor') }} data-value='1' value = '1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title={{ trans('messages.fair') }} data-value='2' value = '2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title={{ trans('messages.good') }} data-value='3' value = '3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title={{ trans('messages.excellent') }} data-value='4' value = '4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title={{ trans('messages.wow') }} data-value='5' value = '5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                </table>
            </section>
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.choose-img'), array('class' => 'mylabel')) }}
            <div id="filediv">
                {{ Form::file('file[]', ['id' => 'file'], 'multiple') }}
            </div>
        </div>
        <div class="row actions">
            {{ Form::button(trans('messages.add-img'), ['id' => 'addScnt', 'class' => 'upload btn btn-primary btn2 col-md-3']) }}
            {{ Form::submit(trans('messages.up-review'), ['id' => 'upload', 'class' => 'upload btn btn-primary btn2 col-md-3', 'id' => 'submit_id']) }}
        </div>
    {{ Form::close() }}
</div>
@stop
