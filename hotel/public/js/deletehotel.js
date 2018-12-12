$(document).ready(function () {
    $('.close.mr20.mt10').click(function () {
        var hotelid = $(this).val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
           url: "./admin/deletehotel",
           type: 'post',
           data: {
               hotelid: hotelid
           },
           success: function (result) {
               
           }
       });
    });
});