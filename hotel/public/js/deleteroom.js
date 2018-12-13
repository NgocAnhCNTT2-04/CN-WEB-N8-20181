$(document).ready(function () {
    $('.closeroom.mr20.mt10').click(function () {
        var roomid = $(this).val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
           url: "./admin/deleteroom",
           type: 'post',
           data: {
               roomid: roomid
           },
           success: function (result) {
               
           }
       });
    });
});