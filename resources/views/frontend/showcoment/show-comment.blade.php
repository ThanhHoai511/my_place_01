<div class="row comment-{{ $data['id']}}">
    {{ Form::hidden('lesstext', $data['id'], array('class' => 'comment-id')) }}
    <div class="col-md-10">
        {{ HTML::image(Auth::user()->pathImage, null, ['class' => 'comment-ava']) }}
        <strong><a href="#">{{ $nameUser }}</a></strong>
        <br/>
        <div class="content-comment">
            <p> {{ $content }}</p>
            <p> {{ trans('messages.time') }} {{ $data['created_at'] }}</p>
        </div>
    </div>
    <div class="col-md-2">
        <div class="dropdown manage-comment">
            <span class="dropdown-toggle manage-dropdown" data-toggle="dropdown"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
            <ul class="dropdown-menu manage-menu">
                <li class="edit">
                    <button type="submit" class="btn edit-comment btn-manage" data-comment-id="{{ $data['id'] }}" data-review-id="{{ $reviewId}}" data-content="{{ $content }}">
                    <i class="fa fa-pencil"></i> 
                    {{ trans('edit') }}
                    </button>
                </li>
                <li>
                    <form class="delete" enctype="multipart/form-data"> 
                        {{ csrf_field() }}
                        <button type="button" class="btn delete-comment btn-manage">
                        <i class="fa fa-trash-o" aria-hidden="true"></i> 
                        {{ trans('delete') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
$('.show-comment').on('click', '.delete-comment', function(e) {
    alert('asas');
        var commentId = $('.comment-id').val();
        var url = baseUrl + 'member/deletecomment';
        $.ajax({
            type: 'post',
            url: url,
            data:{
                'commentId': commentId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('.comment-' + commentId).empty();
            },
        }); 
    });  
});
