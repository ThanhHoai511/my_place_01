$('ul.pagination').hide();
$(function() {
    $('.block').jscroll({
        autoTrigger: true,
        loadingHtml: '<img class="center-block" <i class="fa fa-spinner" aria-hidden="true"></i> alt="Loading..." />',
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.block',
        callback: function() {
            $('ul.pagination').remove();
        }
    });
});
