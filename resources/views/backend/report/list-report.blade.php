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
                <th>{{ trans('messages.address') }}</th>
                <th>{{ trans('messages.submary') }}</th>
                <th>{{ trans('messages.contentreport') }}</th>
                <th>{{ trans('messages.aprove') }}t</th>
                <th>{{ trans('messages.delete') }}</th>
                <th>{{ trans('messages.preview') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->review->place->name }}</td>
                        <td>{{ $report->review->submary }}</td>
                        <td>{{ $report->content }}</td>
                        <td><a href="{{ route('reviews.show', $report->review->id) }}" target="_blank">
                        <input type="button" class="btn btn-success" value="Preview"></a></td>
                        {!! Form::open(['action' => ['ReportController@destroy', $report->id], 'method' =>  'DELETE']) !!}
                        <td>
                        {{ Form::submit(trans('messages.delete'), array('class' => 'btn btn-danger')) }}
                        </td>
                        {{ Form::close() }}
                        {{ Form::open(['action' => 'ReportController@approve']) }}
                        {{ Form::hidden('reviewId', $report->review->id) }}
                        {{ Form::hidden('id', $report->id) }}
                        <td>
                        {{ Form::submit(trans('messages.approve'), array('class' => 'btn btn-info')) }}
                        </td>
                        {{ Form::close() }}
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@stop
