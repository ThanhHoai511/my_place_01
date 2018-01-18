@extends('frontend.master')
@section('main')
<div class="block">
    <div class="row idea-title show-review-title">
        {{ HTML::image($review->user->pathImage) }}
        <a href="{{ route('mywall', $review->user_id) }}">{{ $review->user->name }}</a>
                <div class="expand dropdown">
        {{ Form::button('<i class="fa fa-chevron-down fa-lg"></i>', array('class' => 'btn btn3 dropdown-toggle', 'data-toggle' => 'dropdown')) }}
            <ul class="dropdown-menu dropdown-menu-right collection-ul">
                <li>
                    <ul class="save-collection">{{ trans('messages.save-into-collection') }}
                        @if (isset($collection))
                            @foreach ($collection as $item)
                                <li>
                                    <a href="{{ route('savereview', [$review->id, $item->id]) }}">{{ $item->name }}
                                    @foreach ($checkIfInCol as $check)
                                        @if ($check->collection_id == $item->id)
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            @break;
                                        @endif
                                    @endforeach</a>
                                </li>
                            @endforeach
                            <li><a href="{{ route('savecollection', $review->id) }}"><i class="fa fa-plus" aria-hidden="true"></i>{{ trans('messages.add-to-new-col') }}</a></li>
                        @endif
                    </ul>
                </li>
                {{ Form::open(['action' => 'ReportController@sendReport']) }}
                    @if($hasReport == config('checkbox.checktrue'))
                        <li>{{ trans('messages.reported') }}</li>
                    @else
                        <li>
                            {{ Form::text('content') }}
                            <button type="submit" class="btn btn2">
                                {{ Form::hidden('reviewId', $review->id) }}
                                <i class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></i> 
                                {{ trans('messages.report') }}
                            </button>
                        </li>
                    @endif
                {{ Form::close() }}
            </ul>
        </div>
    </div>
    <div class="row idea-title show-review-title">
        <i class="fa fa-map-marker fa-lg"></i>
        <a href="{{ route('showplace', $review->place_id) }}">{{ $review->place->name }}</a>
    </div>
    <p><b>{{ $review->submary }}</b></p>
    <p class="content-review">{!! $review->content !!}</p><br />
    <div class="slide-image">
    @foreach($review->image  as $item)
    <div>
        {{ HTML::image(($item->PathReview), trans('messages.logo'), ['class' => 'show-img']) }}
    </div>  
    @endforeach
    </div>
    @foreach($rateReview as $rate)
    <h4>
        <div class="like-div">
            @if(Auth::check())
                @if($hasLike == 1)
                    <i class="fa fa-thumbs-up fa-lg icon like-review" data-review-id="{{ $review->id }}" data-rate-id="{{ $rate->id }}"></i><span> {{ $countLike }}</span> <a class="like-show">{{ trans('messages.like') }}</a>
                @else
                    <i class="fa fa-thumbs-up fa-lg like-review" data-review-id="{{ $review->id }}" data-rate-id="{{ $rate->id }}" data-user-id="{{ Auth::user()->id }}"></i><span>{{ $countLike }}</span> 
                    <a class="like-show">{{ trans('messages.like') }}</a>
                @endif
            @else
                <i class="fa fa-thumbs-up fa-lg like-review"></i><span>{{ $countLike }}</span> {{ trans('messages.like') }}
            @endif
        </div>
    </h4>
    @endforeach
    <h4><i class="fa fa-comment fa-lg"></i><span class="count-comment" data-count="{{ $countComment }}"> {{ $countComment }}</span> {{ trans('messages.comment') }}</h4>
    @if(Auth::user()->id == $review->user_id)
    <div class="row">
        <div><a href="{{ route('reviews.edit', $review->id) }}" class="link"><i class="fa fa-pencil-square-o fa-lg"></i>{{ trans('messages.edit') }}</a>
        |<a href=" {{ route('home') }} " class="remove-review"><i class="fa fa-remove fa-lg" data-id="{{ $review->id }}"></i>{{ trans('messages.delete') }}</a></div>
    </div>
    @endif
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
                            <span class="dropdown-toggle manage-dropdown" data-toggle="dropdown"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                            <ul class="dropdown-menu manage-menu">
                                <li class="edit">
                                    <button type="submit" class="btn edit-comment btn-manage" data-comment-id="{{ $comment->id }}" data-review-id="{{ $comment->review_id }}" data-content="{{ $comment->content }}">
                                        <i class="fa fa-pencil"></i> 
                                        {{ trans('site.edit') }}
                                        </button>
                                </li>
                                <li>
                                    <form class="delete" enctype="multipart/form-data"> 
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn delete btn-manage">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                            {{ trans('site.delete') }}
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
<div class="like col-md-5 col-sm-12 background-d8e9ef">
    <p class="close"><i class="fa fa-close fa-lg icon"></i>Close</p>
    @if (isset($like_user))
        @foreach ($like_user as $user)
            <p><i class="fa fa-thumbs-up fa-lg icon"></i>{{ HTML::image($user->user->pathImage, $user->name, ['class' => 'comment-ava']) }}<strong><a href="{{ route('mywall', $user->id) }}">{{ $user->user->name }}</a></strong></p>
        @endforeach
    @endif
</div>
@stop
