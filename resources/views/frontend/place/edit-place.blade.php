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
            @if (isset($city))
                {{ Form::select('city', $cityId, $city->id, ['class' => 'city-select form-control', 'placeholder' => 'choose a city']) }}
            @else
                {{ Form::select('city', $cityId, null, ['class' => 'form-control city-select ', 'placeholder' => 'choose a city']) }}
            @endif
        </div>
        <div class="field">
        {{ Form::label('dist', trans('messages.choose-dist'), array('class' => 'mylabel')) }}
        @if ($place->dist_id)
        <div id="dist-box">
            {{ Form::select('dist_id', $distId, $place->dist_id, ['class' => 'form-control', 'required' => 1]) }}
        </div>
        @else
        <div id="dist-box"></div>
        @endif
        </div>
        <div class="field">
            <ul style="display: inline;">{{ Form::label('category', trans('messages.choose-cate'), array('class' => 'mylabel')) }}
                    @foreach ($category as $value)
                        <li>
                            <ul>{{ Form::checkbox('category', $value->id, null, ['class' => 'col-md-1']) }} 
                            {{ Form::label('place', $value->name . ' - ' . $value->type_concept, array('class' => 'col-md-11')) }}
                            @foreach ($cateChild[$value->id] as $item)
                                @if ($item->parent_id == $value->id)
                                <li>
                                    <div class="col-md-1"></div>
                                    {{ Form::checkbox('category', $item->id, null, ['class' => 'col-md-1']) }}
                                    {{ Form::label('place', $item->name .' - '. $item->type_concept, array('class' => 'col-md-10')) }}
                                    @endif
                                </li>
                            @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.open-hour'), array('class' => 'mylabel')) }}
            {{ Form::time('open', $place->open_hour, ['class' => 'form-control']) }} 
        </div>
        <div class="field">
            {{ Form::label('place', trans('messages.close-hour'), array('class' => 'mylabel')) }}
            {{ Form::time('close', $place->close_hour, ['class' => 'form-control']) }} 
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
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.city-select').on('change', function() {
            var getdistURL = window.location.protocol + '//' + window.location.host + '/get-dists?key=' + this.value;
            $.getJSON(getdistURL, function(data) {
                console.log(data);
                var text = '<select name="dist_id" class="form-control" required>';
                data.forEach(function(d) {
                    text += '<option value="' + d.id + '">' + d.name + '</option>';
                });
                text += '</select>';
                $('#dist-box').html(text);
            });
        })
    });
</script>
@stop
