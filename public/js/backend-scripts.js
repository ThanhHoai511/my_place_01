$(document).ready(function(){
    var baseUrl = window.location.origin+window.location.pathname.split('/')[0] + '/';
    $(".place-expand").click(function(){
        $("#panel1c").toggle();
    });

    $(function () {
        $('.delete-pending-place').on('click', function () { 
            var placeId = $(this).attr('data-id');
            var url = baseUrl + 'admin/deleteplace'
            $.ajax({
                type: 'post',
                url: url,
                data:{
                    'placeId': placeId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    alert('Success');
                }
            });
        });
    }); 
});

