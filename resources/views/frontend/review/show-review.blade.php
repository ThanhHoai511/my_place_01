@extends('frontend.master')
@section('main')
<div class="block">
    <div class="row idea-title">
            {{ HTML::image($review->user->pathImage) }}
            <a href="#">{{ $review->user->name }}</a>
    </div>
    <div class="row idea-title show-review-title">
        <i class="fa fa-map-marker fa-lg"></i>
        <a href="#">{{ $review->place->name }}</a>
        <div class="expand dropdown">
            {{ Form::button('<i class="fa fa-chevron-down fa-lg"></i>', array('class' => 'btn btn3 dropdown-toggle', 'data-toggle' => 'dropdown')) }}
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#">{{ trans('messages.save-into-collection') }}</a></li>
                <li><a href="#">{{ trans('messages.report') }}</a></li>
            </ul>
        </div>
    </div>
    <p><b>{{ $review->submary }}</b></p>
    <p class="more">{!! $review->content !!}</p><br />
    @foreach($review->image  as $item)
        {{ HTML::image(($item->PathReview), trans('messages.logo'), ['class' => 'show-img']) }}    
    @endforeach
    <h4 class="like-show">
        <div class="like-div">
            <i class="fa fa-thumbs-up fa-lg icon"></i>{{ $countLike }} {{ trans('messages.like') }}
        </div>
    </h4>
    <h4><i class="fa fa-comment fa-lg icon"></i>{{ $countComment }} {{ trans('messages.comment') }}</h4>
    <div class="row">
        <div><a href="#" class="link"><i class="fa fa-pencil-square-o fa-lg"></i>{{ trans('messages.edit') }}</a>|<a href="#" class="link"><i class="fa fa-arrow-left fa-lg"></i>{{ trans('messages.back') }}</a>|<a href="#" class="link"><i class="fa fa-remove fa-lg"></i>{{ trans('messages.delete') }}</a></div>
    </div>
    {{ Form::open() }}
        <div class="comment">
            {{ Form::text('comment', null, array('class' => 'comment-input', 'placeholder' => trans('messages.leave-comment'))) }}
            {{ Form::button(trans('messages.send'), array('class' => 'send-comment-btn btn btn2')) }}
        </div>
    {{ Form::close() }}
    @foreach($showComment as $comment)
    <div>
        {{ HTML::image(config('asset.image_path.upload') . $comment->user->avatar, null, ['class' => 'comment-ava']) }}
        <strong><a href="#">{{ $comment->user->name }}</a></strong>
        <br />
        <p>{{ $comment->content }}</p>
    </div>
    @endforeach
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
