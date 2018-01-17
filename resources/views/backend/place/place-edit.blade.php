@extends('backend.master')
@section('main')
<div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
            <div class="large-10 columns">
                <div class="page-name">
                    <h3 class="left">{{ trans('messages.place-manage') }}</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <section id="general">
            <div class="row">
                <div class="large-6 medium-6 columns">
                    {{ Form::open(['action' => ['PlaceController@update', $place->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) }}
                        <div class="custom-panel">
                            <div class="custom-panel-heading">
                                <h4>{{ trans('messages.edit-place') }}</h4>
                            </div>
                            <div class="custom-panel-body">
                                @include('errors.note')
                                <h5>{{ trans('messages.place-name') }}</h5>
                                {{ Form::text('name', $place->name) }}
                                <h5>{{ trans('messages.choose-city') }}</h5>
                                @if ($city)
                                {{ Form::select('city', $cityId, $city->id, ['class' => 'city-select', 'placeholder' => 'choose a city']) }}
                                @else
                                {{ Form::select('city', $cityId, null, ['class' => 'city-select', 'placeholder' => 'choose a city']) }}
                                @endif
                                <h5>{{ trans('messages.choose-dist') }}</h5>
                                @if ($place->dist_id)
                                <div id="dist-box">
                                    {{ Form::select('dist_id', $distId, $place->dist_id, ['class' => 'city-select', 'placeholder' => 'choose a dist']) }}
                                    
                                </div>
                                @else
                                <div id="dist-box"></div>
                                @endif
                                <h5>{{ trans('messages.address') }}</h5>
                                {{ Form::textarea('add', $place->add) }}
                                <h5>{{ trans('messages.open-hour') }}</h5>
                                {{ Form::time('open', $place->open_hour, ['class' => 'time']) }} 
                                <a class="mid-text">{{ trans('messages.to') }}</a>
                                {{ Form::time('close', $place->close_hour, ['class' => 'time']) }}<br /><br /><br />
                                <h5>{{ trans('messages.price-range') }}</h5>
                                {{ Form::number('price_from', $range[0], ['class' => 'time']) }}
                                <a class="mid-text"> - </a>
                                @if (isset($range[1]))
                                {{ Form::number('price_to', $range[1], ['class' => 'time']) }}<br/><br /><br />
                                @else
                                {{ Form::number('price_to', null, ['class' => 'time']) }}<br/><br /><br />
                                @endif
                                <h5>{{ trans('messages.choose-img') }}</h5>
                                {{ Form::file('image', ['id' => 'slide-image']) }}
                                {{ HTML::image($place->image_place, null, ['id' => 'preview']) }}
                                {{ Form::submit(trans('messages.update'), ['class' => 'button radius tiny coral-bg button-slide']) }}
                                <a href="{{ asset('/admin/place/') }}" class="button radius tiny coral-bg button-slide">New Place</a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="large-6 medium-6 columns">
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.dist') }}</h4>
                        </div>
                        <div class="custom-panel-body display-inline width-100">
                            <ul class="slide-list">
                                @foreach ($places as $value)
                                    <li class="slide-item display-inline city">
                                        <div class="col-md-3 padding-0">
                                            {{ HTML::image($value->image_place, trans('messages.place'), ['class' => 'width-100']) }}
                                        </div>
                                        <div class="col-md-5">
                                            <a href="#">{{ $value->name }}</a>
                                            <p>@foreach ($dists as $item)
                                                @if ($item->id == $value->dist_id)
                                                    {{ $item->name }}
                                                    @foreach ($cities as $city)
                                                        @if ($item->city_id == $city->id)
                                                            </p><p>{{ $city->name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach</p>
                                        </div>
                                        <div class="col-md-4">
                                            {!! Form::open(['action' => ['PlaceController@edit', $value->id], 'method' =>  'get']) !!}
                                            {!! Form::submit(Lang::get('messages.change'), ['class' => 'button radius tiny coral-bg button-slide']) !!}
                                            {!! Form::close() !!}
                                            {!! Form::open(['action' => ['PlaceController@destroy', $value->id], 'method' =>  'DELETE']) !!}
                                            {!! Form::submit(Lang::get('messages.del'), ['class' => 'button radius tiny blue-bg button-slide']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            {{ $places->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </section>
    </div>
@stop
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.city-select').on('change', function() {
            var getdistURL = window.location.protocol + '//' + window.location.host + '/get-dists?key=' + this.value;
            $.getJSON(getdistURL, function(data) {
                console.log(data);
                var text = '<select name="dist_id">';
                data.forEach(function(d) {
                    text += '<option value="' + d.id + '">' + d.name + '</option>';
                });
                text += '</select>';
                $('#dist-box').html(text);
            });
        })
        $('.pagination li a').click(function() {
            var page = $(this).attr('href').split('page=')[1];
            $.get('edit?page=' + page, function(data) {
                $('body').html(data);
            });
            return false;
            })
    });
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#slide-image").change(function(){
    readURL(this);
});

</script>
@stop
