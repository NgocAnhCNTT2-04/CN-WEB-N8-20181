$(document).ready(function () {
   $('#addfavorite').click(function () {
       var hotelid = $(this).data("hotelid");
       var userid = $(this).data("userid");
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: "../../profile/favorite/add",
           type: 'post',
           data: {
               userid: userid,
               hotelid: hotelid
           },
           success: function (result) {
               if (result == 1)
                   $('#addfavorite').html("Bỏ yêu thích");
               else
                   $('#addfavorite').html("Yêu thích");
           }
       });
   });
});