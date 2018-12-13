$(document).ready(function () {
   $('#booknow').click(function () {
        var userid = $('#userid').val();
        var roomid = $('#roomid').val();
        $.ajaxSetup({
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          $.ajax({
               url: "./bookroom",
               type:'post',
               data:{
                   userid: userid,
                   roomid: roomid
               },
               success: function(result){
                    alert('Đặt phòng thành công');
                    window.location.href = "../../";
          }
      });
   });
});