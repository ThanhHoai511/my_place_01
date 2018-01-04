$(document).ready(function() {
    $("#log-btn-id").on("click", function(){
        var success = $('#registersuccess_id').val();
        swal(success);
    });
});
