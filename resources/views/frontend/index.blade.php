@extends('frontend.master')
@section('main')
<p id="notice">Notice</p>
<div class="block">
    @foreach($reviews  as $review)
    <div class="block">
        <div class="row idea-title">
                {{ HTML::image($review->user->pathImage) }}
                <b>{{ trans('messages.user') }}</b>
                <a href="#">{{ $review->user->name }}</a>
        </div>
        <div class="row idea-title">
                <b>{{ trans('messages.at') }}</b>
            <i class="fa fa-map-marker fa-lg"></i>
            <a href="#">{{ $review->place->name }}</a>
        </div>
        <div class="row idea-img">
            @foreach($review->image  as $item)
                {{ HTML::image(($item->PathReview)) }}
            @endforeach
            <p><b>{{ $review->submary }}</b></p>
            <p class="more">{{ $review->content }}</p><br />
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
            <div class="mini">
                <p><i class="fa fa-thumbs-up fa-lg  icon"></i>
                    <?php $count = 0 ;?>
                    @foreach ($rateReviewVals as $rateVal)
                        @if ($rateVal->review_id == $review->id && $rateVal->rate_id == 1)
                        <?php $count++ ; ?>
                        @endif
                    @endforeach
                    {{ $count }} {{ trans('messages.like') }}</p>
            </div>
            <div class="mini">
                <p><i class="fa fa-comment fa-lg icon"></i> 15 {{ trans('messages.comment') }}</p>
            </div>
            <br/>
        </div>
        <div class="row idea-btn">
            <div class="btn"><i class="fa fa-eye fa-lg"></i><a href="#">{{ trans('messages.show') }}</a></div>
        </div>
    </div>
    @endforeach
    {{ $reviews->links() }}
    <br>
</div>
@stop
