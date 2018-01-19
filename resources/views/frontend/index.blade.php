@extends('frontend.master')
@section('main')
<div class="block">
    @foreach($reviews  as $review)
    <div class="block">
        <div class="row idea-title">
                {{ HTML::image($review->user->pathImage) }}
                <a href="{{ route('mywall', $review->user_id) }}">{{ $review->user->name }}</a>
                <b>{{ trans('messages.at') }}</b>
            <i class="fa fa-map-marker fa-lg"></i>
            <a href="{{ route('showplace', $review->place_id) }}">{{ $review->place->name }}</a>
        </div>
        <div class="row idea-img">
            <div class="slide-image">
                @foreach($review->image as $item)
                    <div>
                        {{ HTML::image($item->PathReview) }}
                    </div>
                @endforeach
            </div>
            <p><b>{{ $review->submary }}</b></p></br>
            <p class="more">{!! $review->content !!}</p><br />
            {{ Form::hidden('lesstext', trans('messages.pullout'), array('class' => 'lesstext')) }}
            {{ Form::hidden('moretext', trans('messages.seemore'), array('class' => 'moretext')) }}
            <div class="field">
                <label>{{ trans('messages.evaluate') }} </label>
                <section class='rating-widget'>
                    <table>
                        <tr>
                            <td>{{ trans('messages.service') }}</td>
                            <td>
                                <div class='rating-stars'>
                                <ul class='stars'>
                                        <li class='star selected' title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate >= 2 ) selected @endif' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate >= 3 ) selected @endif' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate >= 4 ) selected @endif' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star @if ($review->quality_rate == 5 ) selected @endif' title='WOW!!!' data-value='5'>
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
                                <ul class='stars'>
                                    <li class='star selected' title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star @if ($review->quality_rate >= 2 ) selected @endif' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star @if ($review->quality_rate >= 3 ) selected @endif' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star @if ($review->quality_rate >= 4 ) selected @endif' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star @if ($review->quality_rate == 5 ) selected @endif' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                </ul>
                            </div>
                            </td>
                        </tr>
                    </table>
                </section>
            </div>
            @foreach ($rateReview as $rate)
            <div class="mini">
                <p>
                    @if(Auth::check())
                        @if($hasLike[$review->id] == config('checkbox.checktrue'))
                            <i class="fa fa-thumbs-up fa-lg icon" data-review-id="{{ $review->id }}" data-rate-id="{{ $rate->id }}"></i><span> {{ $countLike[$review->id] }}</span> {{ trans('messages.like') }}
                        @else
                            <i class="fa fa-thumbs-up fa-lg" data-review-id="{{ $review->id }}" data-rate-id="{{ $rate->id }}" data-user-id="{{ Auth::user()->id }}"></i><span> {{ $countLike[$review->id] }}</span> {{ trans('messages.like') }}
                        @endif
                    @else
                        <i class="fa fa-thumbs-up fa-lg"></i><span> {{ $countLike[$review->id] }}</span> {{ trans('messages.like') }}
                    @endif
                </p>
            </div>
            @endforeach
            <div class="mini">
                <p><i class="fa fa-comment fa-lg"></i> <span> {{ $countComment[$review->id] }}</span> {{ trans('messages.comment') }}</p>
            </div>
            <br/>
        </div>
        <div class="row idea-btn">
            <div class="btn"><i class="fa fa-eye fa-lg"></i><a href="{{ route('reviews.show', $review->id) }}">{{ trans('messages.show') }}</a></div>
        </div>
    </div>
    @endforeach
    {{ $reviews->links() }}
    <br>
</div>
@stop
