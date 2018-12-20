$(document).ready(function () {
   $('#canclebook').click(function () {
        var idbooked = $('#idbooked').val();
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
          $.ajax({
               url: 'cancelbook',
               type:'post',
               data:{
                   idbooked: idbooked
               },
               success: function(){
                    alert('Huỷ thành công');
                    window.location.href = "./../";
          }
      });
   });
});