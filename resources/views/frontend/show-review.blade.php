@extends('frontend.master')
@section('main')
<div class="block">
    <div class="row idea-title show-review-title">
        <i class="fa fa-map-marker fa-lg"></i>
        <a href="#">Highland coffee</a>
        <div class="expand dropdown">
            {{ Form::button('<i class="fa fa-chevron-down fa-lg"></i>', array('class' => 'btn btn3 dropdown-toggle', 'data-toggle' => 'dropdown')) }}
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#">{{ trans('messages.save-into-collection') }}</a></li>
                <li><a href="#">{{ trans('messages.report') }}</a></li>
            </ul>
        </div>
    </div>
    {{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'show-img']) }}
    <h4 class="like-show">
        <div class="like-div">
            <i class="fa fa-thumbs-up fa-lg icon"></i>15 {{ trans('messages.like') }}
        </div>
        <div class="like-div">
            <i class="fa fa-thumbs-down fa-lg"></i>5 {{ trans('messages.dislike') }}
        </div>
    </h4>
    <h4><i class="fa fa-comment fa-lg icon"></i>2 {{ trans('messages.comment') }}</h4>
    <div class="row">
        <div><a href="#" class="link"><i class="fa fa-pencil-square-o fa-lg"></i>{{ trans('messages.edit') }}</a>|<a href="#" class="link"><i class="fa fa-arrow-left fa-lg"></i>{{ trans('messages.back') }}</a>|<a href="#" class="link"><i class="fa fa-remove fa-lg"></i>{{ trans('messages.delete') }}</a></div>
    </div>
    {{ Form::open() }}
        <div class="comment">
            {{ Form::text('comment', null, array('class' => 'comment-input', 'placeholder' => trans('messages.leave-comment'))) }}
            {{ Form::button(trans('messages.send'), array('class' => 'send-comment-btn btn btn2')) }}
        </div>
    {{ Form::close() }}
    <div>
        {{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">Admin</a></strong>
        <br />
        <p>Review chuẩn đấy!</p>
    </div>
    <div>
        {{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">User 2</a></strong>
        <br />
        <p>Chỗ này ăn không ngon đâu</p>
    </div>
    </p>
</div>
<div class="like col-md-5 col-sm-12 background-d8e9ef">
    <p class="close"><i class="fa fa-close fa-lg icon"></i>Close</p>
    <p><i class="fa fa-thumbs-up fa-lg icon"></i>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">Admin</a></strong></p>
    <p><i class="fa fa-thumbs-down fa-lg"></i>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">User 2</a></strong></p>
    <p><i class="fa fa-thumbs-up fa-lg icon"></i>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">Admin</a></strong></p>
    <p><i class="fa fa-thumbs-down fa-lg"></i>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">User 2</a></strong></p>
    <p><i class="fa fa-thumbs-up fa-lg icon"></i>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">Admin</a></strong></p>
    <p><i class="fa fa-thumbs-down fa-lg"></i>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">User 2</a></strong></p>
    <p><i class="fa fa-thumbs-up fa-lg icon"></i>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">Admin</a></strong></p>
    <p><i class="fa fa-thumbs-down fa-lg"></i>{{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'comment-ava']) }}<strong><a href="#">User 2</a></strong></p>
</div>
@stop
