n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
var baseUrl = window.location.origin+window.location.pathname.split('/')[0] + '/';
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
var $jq = jQuery.noConflict();
var number = 0;// Declaring and defining global increment variable for rate star.
function selectPlace(val) {
    $('#searchPlace').val(val);
    $('#suggesstion-box').hide();
}
$(document).ready(function(){
    $(".like-show").click(function(){
        $(".like").toggle();
    });
    $(".close").click(function(){
        $(".like").hide();
    });
    $('#myCarousel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        // dots: true,
        autoplaySpeed: 1000,
        vertical: true,
        verticalSwiping: true,
        nextArrow: '<i class="fa fa-angle-down"></i>',
        prevArrow: '<i class="fa fa-angle-up"></i>'
    });
    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars-quality li').on('mouseover', function(){
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
        var ratingValue = parseInt($('.stars li.selected').last().data('value'), 10);
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
            var ratingValue = parseInt($('.stars li.selected').last().data('value'), 10);
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
        $(".fa-thumbs-up").on("click", function (e) {
            var reviewId = $(this).data("review-id");
            var rateId = $(this).data("rate-id");
            var url = baseUrl + 'member/reviews';
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
                    if(data['icon'] == true) {
                        $(".fa-thumbs-up").addClass('icon');
                    } else {
                        $(".fa-thumbs-up").removeClass('icon');
                    }
                }
            });
        });
    });    
});
