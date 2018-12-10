$(document).ready(function () {
    $('.close.mr20.mt10').click(function () {
        var hotel_id = $(this).val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
            url: "./admin/deletehotel",
            type:'post',
            data:{
                hotel_id: hotel_id
            },
            success: function () {
                //window.location.href = window.location.href;
            }
        });
    });
});