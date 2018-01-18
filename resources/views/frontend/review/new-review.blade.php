@extends('frontend.master')
@section('main')
<div class="block">
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Location-exists')" id="defaultOpen">Địa điểm có sẵn</button>
        <button class="tablinks" onclick="openCity(event, 'Location-new')">Tạo mới địa điểm</button>
    </div>
    <div id="Location-exists" class="tabcontent">
        <div id="error_explanation">
            <h2>
                {{ trans('messages.create-review') }}
            </h2>
        </div>
        {{ Form::open(['action' => 'ReviewController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
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
    <div id="Location-new" class="tabcontent">
        <div class="field">
        {{ Form::text('searchInput', null, ['id' => 'searchInput', 'class' => 'controls','placeholder' => 'Enter a location', 'required' => 'true']) }}
            <div id="map"></div>
            <ul id="geoData">
                <li>{{ trans('messages.add') }}: <span id="location"></span></li>
                <li>{{ trans('messages.postalcode') }}: <span id="postal_code"></span></li>
                <li>{{ trans('messages.country') }}: <span id="country"></span></li>
                <li>{{ trans('messages.latitude') }}: <span id="lat"></span></li>
                <li>{{ trans('messages.longitude') }}: <span id="lon"></span></li>
                {{ Form::button(trans('messages.add-address'), ['class' => 'upload btn btn-primary btn2 col-md-3 add-address']) }}
            </ul>
        </div>
    </div>
</div>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    
    document.getElementById("defaultOpen").click();
</script>
@stop
