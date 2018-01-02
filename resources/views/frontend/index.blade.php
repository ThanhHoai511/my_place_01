@extends('frontend.master')
@section('main')
<p id="notice">Notice</p>
<div class="block">
    @foreach($reviews  as $review)
    <div class="block">
        <div class="row idea-title">
            <i class="fa fa-map-marker fa-lg"></i>
            <a href="#">{{ $review->place->name }}</a>
        </div>
        <div class="row idea-img">
            @foreach($review->image  as $item)
                {{ HTML::image(config('asset.image_path.imagereviews') . $item->link) }}
            @endforeach
            <p><b>{{ $review->submary }}</b></p>
            <p>{{ $review->content }}</p><br />
            <div class="field">
                <label>Đánh giá: </label>
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
    <br>
</div>
@stop
