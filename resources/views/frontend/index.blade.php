@extends('frontend.master')
@section('main')
<p id="notice">Notice</p>
<div class="block">
    <div class="block">
        <div class="row idea-title">
            <i class="fa fa-map-marker fa-lg"></i>
            <a href="#">KFC Trần Khát Chân</a>
        </div>
        <div class="row idea-img">
            {{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', 'Logo') }}
            <p><b>Set Chizza mới</b></p>
            <p>Chizza khá đắt mà ít<br/>
                Được điểm là phục vụ nhanh, nhưng giờ trưa khá đông.
            </p><br />
            <div class="field">
                <label>Đánh giá: </label>
                <section class='rating-widget'>
                    <table>
                        <tr>
                            <td>{{ trans('messages.service') }}</td>
                            <td>
                                <div class='rating-stars'>
                                <ul class='stars'>
                                    <li class='star selected' title={{ trans('messages.poor') }} data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star selected' title={{ trans('messages.fair') }} data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star selected' title={{ trans('messages.good') }} data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star selected' title={{ trans('messages.excellent') }} data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title={{ trans('messages.wow') }} data-value='5'>
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
                                    <li class='star selected' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
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
                <p><i class="fa fa-thumbs-up fa-lg  icon"></i> 5 {{ trans('messages.like') }}</p>
            </div>
            <div class="mini">
                <p><i class="fa fa-thumbs-down fa-lg"></i> 2 {{ trans('messages.dislike') }}</p>
            </div>
            <div class="mini">
                <p><i class="fa fa-comment fa-lg  icon"></i> 15 {{ trans('messages.comment') }}</p>
            </div>
            <br/>
        </div>
        <div class="row idea-btn">
            <div class="btn"><i class="fa fa-eye fa-lg"></i><a href="#">{{ trans('messages.show') }}</a></div>
            <div class="btn"><i class="fa fa-edit fa-lg"></i><a href="#">{{ trans('messages.edit') }}</a></div>
            <div class="btn"><i class="fa fa-remove fa-lg"></i><a href="#" onclick="return confirm('Are you sure?');">{{ trans('messages.delete') }}</a></div>
        </div>
    </div>
    <div class="block">
        <div class="row idea-title">
            <i class="fa fa-map-marker fa-lg"></i>
            <a href="#">KFC Trần Khát Chân</a>
        </div>
        <div class="row idea-img">
            {{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo')) }}
            <p><b>Set Chizza mới</b></p>
            <p>Chizza khá đắt mà ít<br/>
                Được điểm là phục vụ nhanh, nhưng giờ trưa khá đôngdjjjjjjjjjjjj jjjjjjjjjjjjjjjjjjjj jjjjjjjj jjjjjjjjjjjjj jjjjjjjjj jjjjjjjj jjjjjjjj jjjjjjjjjjjjj jjjjjjjjjj jjjjjjjj jjjjjjjjjjjjj jjjjjjj jjjjjjjjjjjjjjjj jjjjjjjjjj jjjjjjjjjjjjjjj jjjjjjjjjjjjjjjjjjj.
            </p><br />
            <div class="field">
                <label>{{ trans('messages.rate') }}: </label>
                <section class='rating-widget'>
                    <table>
                        <tr>
                            <td>{{ trans('messages.service') }}</td>
                            <td>
                                <div class='rating-stars'>
                                <ul class='stars'>
                                    <li class='star selected' title={{ trans('messages.poor') }} data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star selected' title={{ trans('messages.fair') }} data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star selected' title={{ trans('messages.good') }} data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star selected' title={{ trans('messages.excellent') }} data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title={{ trans('messages.wow') }} data-value='5'>
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
                                    <li class='star selected' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
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
                <p><i class="fa fa-thumbs-up fa-lg  icon"></i> 5 {{ trans('messages.like') }}</p>
            </div>
            <div class="mini">
                <p><i class="fa fa-thumbs-down fa-lg"></i> 2 {{ trans('messages.dislike') }}</p>
            </div>
            <div class="mini">
                <p><i class="fa fa-comment fa-lg  icon"></i> 15 {{ trans('messages.comment') }}</p>
            </div>
            <br/>
        </div>

        <div class="row idea-btn">
            <div class="btn"><i class="fa fa-eye fa-lg"></i><a href="#">{{ trans('messages.show') }}</a></div>
            <div class="btn"><i class="fa fa-edit fa-lg"></i><a href="#">{{ trans('messages.edit') }}</a></div>
            <div class="btn"><i class="fa fa-remove fa-lg"></i><a href="#" onclick="return confirm('Are you sure?');">{{ trans('messages.delete') }}</a></div>
        </div>
    </div>
    <br>
</div>
@stop
