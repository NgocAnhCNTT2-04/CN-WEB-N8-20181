$(function() {
    $('.js-user-role').change(function(){
      if ($(this).prop('checked'))
        role = 1;
      else
        role = 0;
      var userid = $(this).data('userid');
      $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
      $.ajax({
        url: "./user/updaterole",
        type:'post',
        data:{
          userid: userid,
          role: role
        },
        success: function(){
          //alert("success");
        }
      });
    });
});
