n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
var $jq = jQuery.noConflict();
var number = 0;// Declaring and defining global increment variable for rate star.
function selectPlace(val) {
    $('#searchPlace').val(val);
    $('#suggesstion-box').hide();
}
$(document).ready(function(){
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
    $('.stars li').on('mouseover', function(){
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
    $('.stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }
        
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }        
        var ratingValue = parseInt($('.stars li.selected').last().data('value'), 10);
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
    $(".place").on("click", function() {
        console.log('bb');
    });
    $('#searchPlace').keyup(function(){
        var key = $('#searchPlace').val();
        var searchURL = window.location.protocol + "//" + window.location.host + "/getplaces?key=" + key;
        $('#suggesstion-box').show();
        $.getJSON(searchURL, function(data) {
            var text = '<ul class="search-option">';
            data.forEach(function(d) {
                text += '<li class="place" data-name="' + d.name + '">' + d.name + '</li>';
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
        });
    });
});
