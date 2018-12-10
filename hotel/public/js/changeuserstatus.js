$(function() {
    $('.js-user-status').change(function(){
      if ($(this).prop('checked'))
        status = 1;
      else
        status = 0;
      var userid = $(this).data('userid');
      $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
      $.ajax({
        url: "./user/updatestatus",
        type:'post',
        data:{
          userid: userid,
          status: status
        },
        success: function(html){
          //alert(123);
        }
      });
    });
});
