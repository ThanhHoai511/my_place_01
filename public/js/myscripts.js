n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
var $jq = jQuery.noConflict();
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
});
