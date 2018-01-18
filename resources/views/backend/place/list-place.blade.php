@extends('backend.master')
@section('main')
<div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
            <div class="large-10 columns">
                <div class="page-name">
                    <h3 class="left">{{ trans('messages.slide-manage') }}</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <table class="table tab-content table-bordered">
            <thead>
            <tr>
                <th>{{ trans('messages.name') }}</th>
                <th>{{ trans('messages.dist') }}</th>
                <th>{{ trans('messages.price-range') }}</th>
                <th>{{ trans('messages.open-hour') }}</th>
                <th>{{ trans('messages.close-hour') }}</th>
                <th>{{ trans('messages.img') }}</th>
                <th>{{ trans('messages.approve') }}</th>
                <th>{{ trans('messages.delete') }}</th>
                <th>{{ trans('messages.preview') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach( $placePendings as $placePending)
                <tr>
                    <td>{{ $placePending->name }}</td>
                    <td>{{ $placePending->dist->name }}</td>
                    <td>{{ $placePending->range }}</td>
                    <td>{{ $placePending->open_hour }}</td>
                    <td>{{ $placePending->close_hour }}</td>
                    <td>{{ HTML::image(config('asset.image_path.imagereviews') . $placePending->image, null, ['class' => 'width-100']) }}</td>
                    <td><a href="{{ route('previewplade', $placePending->id) }}" target="_blank">
                        <input type="button" class="btn btn-success" value="Preview"></a></td>
                    <td>
                    <div class="delete-pending-place" data-id="{{$placePending->id}}">
                    <a href="{{ route('listplace') }}">
                    {{ Form::button(trans('messages.delete'), array('class' => 'btn btn-danger')) }}
                    </a>
                    </div>
                    </td>
                    <td>
                    {{ Form::open(['action' => 'PlaceController@appovePlace']) }}
                        {{ Form::hidden('place_id', $placePending->place_id) }}
                        {{ Form::hidden('name', $placePending->name) }}
                        {{ Form::hidden('id', $placePending->id) }}
                        {{ Form::hidden('add', $placePending->add) }}
                        {{ Form::hidden('dist_id', $placePending->dist_id) }}
                        {{ Form::hidden('open', $placePending->open_hour) }}
                        {{ Form::hidden('close', $placePending->close_hour) }}
                        {{ Form::hidden('image', $placePending->image) }}
                        {{ Form::hidden('range', $placePending->range) }}
                        {{ Form::submit(trans('messages.approve'), array('class' => 'btn btn-info')) }}
                    {{ Form::close() }}
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
</div>
@stop
