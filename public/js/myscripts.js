n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
var baseUrl = window.location.origin+window.location.pathname.split('/')[0] + '/';
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
var $jq = jQuery.noConflict();
var number = 0;
function selectPlace(val) {
    $('#searchPlace').val(val);
    $('#suggesstion-box').hide();
}
$(document).ready(function(){
    var pusher = new Pusher('8943d5df75785a738cfe', {
        cluster: 'ap1',
        encrypted: true
    });
    var userID = $('#checkUser').val();
    var countNotifications = $('.noti').text();
    //Push Notification
    var channel = pusher.subscribe('notifications');
    channel.bind('App\\Events\\Notifications', addNotifications);
    function addNotifications(data) {
        if (userID == data.notificationOfUser)
        {
            if (data.action == 'follow')
            {
                countNotifications = Number(countNotifications) + data.numberNotification;
                li = '';
                li += '<li style="background-color:#c9edfb" data-id='+ data.notificationId +'>';
                li += '<a href="/member/user/wall/' + data.reviewId + '">';
                li += '<div>';
                li += '<img src="' + data.avatar + '"' + ' class="float-left" alt="Logo">';
                li += '<div>'+ data.message + '</div>';
                li += '</div>';
                li += '</a>';
                li += '</li>';
                $("#notification ul").prepend(li);
                $('.noti').replaceWith('<a class="noti">' + countNotifications + '</a>');

            } else {
                countNotifications = Number(countNotifications) + data.numberNotification;
                li = '';
                li += '<li style="background-color:#c9edfb" data-id='+ data.notificationId +'>';
                li += '<a href="/member/reviews/' + data.reviewId + '">';
                li += '<div>';
                li += '<img src="' + data.avatar + '"' + ' class="float-left" alt="Logo">';
                li += '<div>'+ data.message + '</div>';
                li += '</div>';
                li += '</a>';
                li += '</li>';
                $("#notification ul").prepend(li);
                $('.noti').replaceWith('<a class="noti">' + countNotifications + '</a>');
            }
        } else {
            return false
        }
    };
    //Disbale notification
    var channelDisableNotification = pusher.subscribe('disableNotification');
    channelDisableNotification.bind('App\\Events\\DisableNotificaton', disAbleNotifications);
    function disAbleNotifications(data)
    {
        var notificationId = $(this).data("id");
        if (userID == data.notificationOfUser && data.status == 1) {
            if (countNotifications > 0) {
                countNotifications = Number(countNotifications) - 1;
            }
            $('.noti').replaceWith('<a class="noti">' + countNotifications + '</a>');
            $('.list-notification li').first().remove();
        } else {
            return false
        }
    };
    //Change status
    $("ul.list-notification").on("click","li", function(){
        var notificationId = $(this).data("id");
        var url = baseUrl + ('member/notifications/changestatus')
        $.ajax({
            type: 'post',
            url: url,
            data:{
                'notificationId': notificationId, 
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (countNotifications > 0) {
                    countNotifications = Number(countNotifications) - 1;
                }
                $('.noti').replaceWith('<a class="noti">' + countNotifications + '</a>');
            }
        });
        });

    $(".like-show").click(function(){
        $(".like").toggle();
    });
    $(".place-expand").click(function(){
        $("#panel1c").toggle();
    });
    $(".close").click(function(){
        $(".like").hide();
    });
    $('#myCarousel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        vertical: true,
        verticalSwiping: true,
        nextArrow: '<i class="fa fa-angle-down"></i>',
        prevArrow: '<i class="fa fa-angle-up"></i>'
    });
    $('.slide-image').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
      });
      
    $('#stars-quality li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10);
        $(this).parent().children('li.star').each(function(e){
          if (e < onStar) {
            $(this).addClass('hover');
          }
          else {
            $(this).removeClass('hover');
            }
        });
    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
        });
    });  
    /* 2. Action to perform on click */
    $('#stars-quality li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        $('#quality_rate_id').val(onStar);
        
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }
        
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }        
        var ratingValue = parseInt($('#stars-quality li.selected').last().data('value'), 10);
        var msg = ratingValue;
        $('#ratequality_id').val(msg);
    });
        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars-service li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
       
        // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
              if (e < onStar) {
                $(this).addClass('hover');
              }
              else {
                $(this).removeClass('hover');
                }
            });
        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover');
            });
        });  
        /* 2. Action to perform on click */
        $('#stars-service li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');
            $('#service_rate_id').val(onStar);
            
            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }
            
            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }        
            var ratingValue = parseInt($('#stars-service li.selected').last().data('value'), 10);
            var msg = ratingValue;
            $('#rateservice_id').val(msg);
        });
    $('#addScnt').click(function() {
        $(this).before($("<div/>", {
            id: 'filediv'
        }).fadeIn('slow').append($("<input/>", {
            name: 'file[]',
            type: 'file',
            id: 'file'
        }), $("<br/><br/>")));
    });
    // Following function will executes on change event of file input to select different file.
    $('body').on('change', '#file', function() {
        if (this.files && this.files[0]) {
            number += 1; // Incrementing global variable by 1.
            var z = number - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='img-div" + number + "' class='img-div'><img id='previewimg" + number + "' src=''/><br /></div>");
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
            $(this).hide();
            $("#img-div" + number).append($('<img src="x.png" alt="Delete"/><br/>').click(function() {
                $(this).parent().parent().remove();
            }));
        }
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function(){
        readURL(this);
    });
    // To Preview Image
    function imageIsLoaded(e) {
        $('#previewimg' + number).attr('src', e.target.result);
    };
    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name) {
            alert("First Image Must Be Selected");
        e.preventDefault();
        }
    });
    $('#searchPlace').keyup(function(){
        var key = $('#searchPlace').val();
        var searchURL = window.location.protocol + "//" + window.location.host + "/get-places?key=" + key;
        $('#suggesstion-box').show();
        $.getJSON(searchURL, function(data) {
            var text = '<ul class="search-option">';
            data.forEach(function(d) {
                text += '<li class="place"  data-id="' + d.id + '" data-name="' + d.name + '">' + d.name + '</li>';
            });
            text += '</ul>';
            $('#suggesstion-box').html(text);
        });
        fetch(searchURL) // Call the fetch function passing the url of the API as a parameter
        .then(function() {
            $('.place').each(function () {
                var $this = $(this);
                $this.on("click", function () {
                    $('#searchPlace').val($(this).text());
                    $('#suggesstion-box').hide();
                });
            });
            $('.place').on("click", function() {
                var placeId = ($(this).data('id'));
                $('#place_id').val(placeId);
            });
        });
    });
    $(function () {
        $(".like-review").on("click", function (e) {
            var reviewId = $(this).data("review-id");
            var rateId = $(this).data("rate-id");
            var url = baseUrl + 'member/likereviews';
            var container = $(this).find('+span');
            $.ajax({
                type: 'post',
                url: url,
                data:{
                    'reviewId': reviewId, 
                    'rateId': rateId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    var value = data['countLike'];
                    $(container).html(value);
                    if (reviewId == data['reviewId']) {
                        if(data['icon'] == true) {
                            $(".fa-thumbs-up").addClass('icon');
                        } else {
                            $(".fa-thumbs-up").removeClass('icon');
                        }
                    }
                }
            });
        });
    });
    //Them comment
    $(function () {
        $('.send-comment-btn').on('click', function (e) {
            var url = baseUrl + 'member/comment';
            var reviewId = $('#review-id').val();
            var comment = $('.comment-input').val();
            var count = (parseInt($('.count-comment').attr('data-count')) + (1));
            $.ajax({
                type: 'post',
                url: url,
                data:{
                    'comment': comment,
                    'reviewId': reviewId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('.comment-input').val('');
                    $('.show-comment').prepend(data);
                    $('.count-comment').html(count);
                }
            });
        });
    });
    //Xoa anh delete image
    $(function () {
        $('.removeimage').on('click', function (e) {
            var url = baseUrl + 'member/deleteimage';
            var imageId = $(this).data('id');
            $('.image-old-' + imageId).remove();
            $.ajax({
                type: 'post',
                url: url,
                data:{
                    'imageId': imageId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    alert('Delete success');
                }
            });
        });
    });
    //Xoa review
    $(function () {
        $('.remove-review').on('click', function (e) {
            var url = baseUrl + 'member/removereview';
            var reviewId = $(this).data('id');
            $.ajax({
                type: 'post',
                url: url,
                data:{
                    'reviewId': reviewId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    alert(data['dataSuccess']);
                }
            });
        });
    });
    //Xoa colection
    $(function () {
        $('.remove-colection').on('click', function (e) {
            var collectionId = $(this).data("id");
            var collectionName = $(this).data("name");
            var url = baseUrl + 'member/removecolection';
            $.ajax({
                type: 'post',
                url: url,
                data:{
                    'collectionId': collectionId,
                    'collectionName': collectionName,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('.colection-' + collectionId).empty();
                    alert('Delete success ' + data['collectionName']);
                }
            });
        });
    });
    //Sua comment removeimage
    $(function () {
        $('.edit-comment').on('click', function (e) {
            var commentId = $(this).attr('data-comment-id');
            var reviewId = $(this).attr('data-review-id');
            var content = $(this).attr('data-content');
            var edit = $(this);
            form = '';
            form += '<form class="comment-update" method="get" enctype="multipart/form-data">'
            form += '<input type="hidden" name="_token" value="{{ csrf_token() }}">'
            form += '<input type="hidden" name="review_id" class="review_id" value='+ reviewId +'>'
            form += '<input type="hidden" name="comment_id" class="comment_id" value='+ commentId +'>'
            form += '<textarea name="content" class="content-update form-control">'+ content + '</textarea>'
            form += '<button type="submit" class="btn buttonTransparent btn-comment">Edit</button>'
            form += '</form>';
            edit.parents('.comment-show').find('.content-comment').html(form);

            
        $('.comment-update').on('submit', function(e) {
                var contentUpdate = $('.content-update').val();
                var reviewId = $('.review_id').val();
                var commentId = $('.comment_id').val();
                var url = baseUrl + 'member/updatecomment';
                $.ajax({
                    type: 'post',
                    url: url,
                    data:{
                        'contentUpdate': contentUpdate,
                        'reviewId': reviewId,
                        'commentId': commentId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        edit.parents('.comment-content').html(response);
                    },
                }); 
            });
        });
    });
    //Xoa comment   
$('.delete-comment').on('click', function(e) {
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
$('.show-comment').on('click', '.delete-comment', function(e) {
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
//Following 
$('.interactive').on('click', '.follow', function (){
    var userFollower = $(this).data("user-follower");
    var userFollowing = $(this).data("user-following");
    var url = baseUrl + 'member/user/follow';
    $.ajax({
        type: 'post',
        url: url,
        data:{
            'userfollower_id': userFollower,
            'userfollowing_id': userFollowing,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            $('.interactive .follow').removeClass('btn-primary follow').addClass('btn-success unfollow').html('Following');
        },
    }); 
});

$('.interactive').on('click', '.unfollow', function (){
    var userFollower = $(this).data("user-follower");
    var userFollowing = $(this).data("user-following");

    var url = baseUrl + 'member/user/unfollow';
    $.ajax({
        type: 'post',
        url: url,
        data:{
            'userfollower_id': userFollower,
            'userfollowing_id': userFollowing,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            $('.interactive .unfollow').removeClass('btn-success unfollow').addClass('btn-primary follow').html('Follow');
        },
    }); 

})

$('.show-comment').on('click', '.edit-comment', function (e) {
    var commentId = $(this).attr('data-comment-id');
    var reviewId = $(this).attr('data-review-id');
    var content = $(this).attr('data-content');
    var edit = $(this);
    form = '';
    form += '<form class="comment-update" method="get" enctype="multipart/form-data">'
    form += '<input type="hidden" name="_token" value="{{ csrf_token() }}">'
    form += '<input type="hidden" name="review_id" class="review_id" value='+ reviewId +'>'
    form += '<input type="hidden" name="comment_id" class="comment_id" value='+ commentId +'>'
    form += '<textarea name="content" class="content-update form-control">'+ content + '</textarea>'
    form += '<button type="submit" class="btn buttonTransparent btn-comment">Edit</button>'
    form += '</form>';
    edit.parents('.comment-show').find('.content-comment').html(form);

    
    $('.show-comment').on('click','.comment-update', function(e) {
            var contentUpdate = $('.content-update').val();
            var reviewId = $('.review_id').val();
            var commentId = $('.comment_id').val();
            var url = baseUrl + 'member/updatecomment';
            $.ajax({
                type: 'post',
                url: url,
                data:{
                    'contentUpdate': contentUpdate,
                    'reviewId': reviewId,
                    'commentId': commentId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    edit.parents('.comment-content').html(response);
                },
            }); 
        });
    });
});
