@extends('backend.master')
@section('main')
<div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
            <div class="large-10 columns">
                <div class="page-name">
                    <h3 class="left">{{ trans('messages.dist-manage') }}</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <section id="general">
            <div class="row">
                <div class="large-6 medium-6 columns">
                    {{ Form::open(['action' => 'DistrictController@store', 'method' => 'POST']) }}
                        <div class="custom-panel">
                            <div class="custom-panel-heading">
                                <h4>{{ trans('messages.add-dist') }}</h4>
                            </div>
                            <div class="custom-panel-body">
                                @include('errors.note')
                                <h5>Choose a city</h5>
                                {{ Form::select('city', $cityId, $getCity->id) }}
                                <h5>{{ trans('messages.city-old-name') }}: {{ $dist->name }}</h5>
                                <h5>{{ trans('messages.change-to')}}: </h5>
                                {{ Form::text('name', null) }}
                                {{ Form::submit( trans('messages.change'), ['class' => 'button radius tiny coral-bg button-slide']) }}
                                <a href="{{ asset('/admin/dist/') }}" class="button radius tiny coral-bg button-slide">New District</a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="large-6 medium-6 columns">
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.dist') }}</h4>
                        </div>
                        <div class="custom-panel-body display-inline">
                            <ul class="slide-list">
                                @foreach ($dists as $value)
                                    <li class="slide-item display-inline city">
                                        <div class="col-md-4">
                                            <a href="#">{{ $value->name }}</a>
                                            <p>@foreach ($cities as $item)
                                                @if ($item->id == $value->city_id)
                                                    {{ $item->name }}
                                                @endif
                                            @endforeach</p>
                                        </div>
                                        <div class="col-md-4">
                                            {!! Form::open(['action' => ['DistrictController@edit', $value->id], 'method' =>  'get']) !!}
                                            {!! Form::submit(Lang::get('messages.change'), ['class' => 'button radius tiny coral-bg button-slide']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Form::open(['action' => ['DistrictController@destroy', $value->id], 'method' =>  'DELETE']) !!}
                                            {!! Form::submit(Lang::get('messages.del'), ['class' => 'button radius tiny blue-bg button-slide']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            {{ $dists->links() }}
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
        $('.pagination li a').click(function() {
            var page = $(this).attr('href').split('page=')[1];
            $.get('edit?page=' + page, function(data) {
                $('body').html(data);
            });
            return false;
            })
    });
</script>
@stop
