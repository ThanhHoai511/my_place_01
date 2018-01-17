@extends('frontend.master')
@section('main')
<div class="block">
    @foreach ($infoPlaces as $infoPlace)
    <div class="panel panel-info">
        <div class="panel-heading">
            <a href="{{ route('showplace', $infoPlace->id) }}"><h3 class="panel-title">{{ $infoPlace->name }}</h3></a>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12" align="center">
                    {{ HTML::image($infoPlace->ImagePlace, null, ['class' => 'width100']) }}
                </div>
                <div class=" col-md-12">
                    <table class="table table-user-information">
                        <tbody>
                            @if($infoPlace->open_hour == null || $infoPlace->close_hour || $infoPlace->range)
                            <tr>
                                <a href="{{ route('editplace', $infoPlace->id) }}" class="link"><i class="fa fa-pencil-square-o fa-lg"></i>{{ trans('messages.edit') }}</a>
                            </tr>
                            @endif
                            <tr>
                                <td>{{ trans('messages.review') }}</td>
                                <td>{{ $infoPlace->total_rate }} lượt</td>
                            </tr>
                            <tr>
                                <td>{{ trans('messages.add') }}</td>
                                <td>{{ $infoPlace->add }}</td>
                            </tr>
                            @if($infoPlace->open_hour != null)
                            <tr>
                                <td>{{ trans('messages.openhour') }}</td>
                                <td>{{ $infoPlace->open_hour }}</td>
                            </tr>
                            @endif
                            @if($infoPlace->close_hour != null)
                            <tr>
                                <td>{{ trans('messages.closehour') }}</td>
                                <td>{{ $infoPlace->close_hour }}</td>
                            </tr>
                            @endif
                            @if($infoPlace->range != null)
                            <tr>
                                <td>{{ trans('messages.range') }}</td>
                                <td>{{ $infoPlace->range }} đ</td>
                            </tr>
                            @endif
                            <tr>
                                <td>{{ trans('messages.service') }}</td>
                                <td>
                                    <div class='rating-stars'>
                                        <ul class='stars'>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate >= 1 ) selected @endif' title='Poor' data-value='1'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate > 1.5 ) selected @endif' title='Fair' data-value='2'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate > 2.5 ) selected @endif' title='Good' data-value='3'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate > 3.5 ) selected @endif' title='Excellent' data-value='4'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate > 4.5 ) selected @endif' title='WOW!!!' data-value='5'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                        </ul>
                                        <span>{{ number_format($infoPlace->avg_service_rate/$infoPlace->total_rate, 2) }}/5 in {{ $infoPlace->total_rate }} rated </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ trans('messages.quality') }}</td>
                                <td>
                                    <div class='rating-stars'>
                                        <ul class='stars'>
                                            <li class='star @if ($infoPlace->avg_service_rate/$infoPlace->total_rate >= 1 ) selected @endif' title='Poor' data-value='1'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_quality_rate/$infoPlace->total_rate > 1.5 ) selected @endif' title='Fair' data-value='2'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_quality_rate/$infoPlace->total_rate > 2.5 ) selected @endif' title='Good' data-value='3'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_quality_rate/$infoPlace->total_rate > 3.5 ) selected @endif' title='Excellent' data-value='4'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star @if ($infoPlace->avg_quality_rate/$infoPlace->total_rate > 4.5) selected @endif' title='WOW!!!' data-value='5'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                        </ul>
                                        <span>{{ number_format($infoPlace->avg_quality_rate/$infoPlace->total_rate, 2) }}/5 in {{ $infoPlace->total_rate }} rated </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop