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
    @foreach($rateReview as $rate)
    <h4 class="like-show">
        <div class="like-div">
            @if(Auth::check())
                @if($hasLike == 1)
                    <i class="fa fa-thumbs-up fa-lg icon" data-review-id="{{ $review->id }}" data-rate-id="{{ $rate->id }}"></i><span>{{ $countLike }}</span> {{ trans('messages.like') }}
                @else
                    <i class="fa fa-thumbs-up fa-lg" data-review-id="{{ $review->id }}" data-rate-id="{{ $rate->id }}" data-user-id="{{ Auth::user()->id }}"></i><span>{{ $countLike }}</span> {{ trans('messages.like') }}
                @endif
            @else
                <i class="fa fa-thumbs-up fa-lg"></i><span>{{ $countLike }}</span> {{ trans('messages.like') }}
            @endif
        </div>
    </h4>
    @endforeach
    <h4><i class="fa fa-comment fa-lg"></i><span class="count-comment" data-count="{{ $countComment }}">{{ $countComment }}</span>{{ trans('messages.comment') }}</h4>
    <div class="row">
        <div><a href="#" class="link"><i class="fa fa-pencil-square-o fa-lg"></i>{{ trans('messages.edit') }}</a>|<a href="#" class="link"><i class="fa fa-arrow-left fa-lg"></i>{{ trans('messages.back') }}</a>|<a href="#" class="link"><i class="fa fa-remove fa-lg"></i>{{ trans('messages.delete') }}</a></div>
    </div>
    {{ Form::open(['action' => 'ReviewController@comment']) }}
        <div class="comment">
            {{ Form::text('comment', null, array('class' => 'comment-input', 'placeholder' => trans('messages.leave-comment'))) }}
            {{ Form::button(trans('messages.send'), array('class' => 'send-comment-btn btn btn2')) }}
            {{ Form::hidden('review-id', $review->id, array('id' => 'review-id')) }}
        </div>
    {{ Form::close() }}
    <div class="show-comment">
        <div class="row">
            @foreach($showComment as $comment)
            <div class="comment-show">
                {{ Form::hidden('lesstext', $comment->id, array('class' => 'comment-id')) }}
                <div class="col-md-10">
                    {{ HTML::image($comment->user->pathImage, null, ['class' => 'comment-ava']) }}
                    <strong><a href="#">{{ $comment->user->name }}</a></strong>
                    <br/>
                    <div class="content-comment">
                        <p> {{ $comment->content }}</p>
                        <p> {{ trans('messages.time') }} {{ $comment->created_at }}</p>
                    </div>
                </div>
                @if(Auth::user()->id == $comment->user_id)
                    <div class="col-md-2">
                        <div class="dropdown manage-comment">
                            <span class="dropdown-toggle manage-dropdown" data-toggle="dropdown">...</span>
                            <ul class="dropdown-menu manage-menu">
                                <li class="edit">
                                    <button type="submit" class="btn edit-comment btn-manage" data-comment-id="{{ $comment->id }}" data-review-id="{{ $comment->review_id }}" data-content="{{ $comment->content }}">
                                        <i class="fa fa-pencil"></i> 
                                        {{ trans('site.edit') }}...
                                        </button>
                                </li>
                                <li>
                                    <form class="delete" enctype="multipart/form-data"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn delete btn-manage">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                            {{ trans('site.delete') }}...
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>    
            @endforeach
        </div>
    </div>
    </p>
</div>
@stop
