$(document).ready(function () {
    $('#updateprofile').click(function () {
        if($('#ms').is(':checked'))
            var gender = 2;
        else if ($('#mr').is(':checked'))
            var gender = 1;
        else
            var gender = 3;

        var name = $('#name').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var id = $('#updateprofile').val();
        if (name === "" || username === "" || email === "" || phone === "" || address === "")
        {
            if (!$('#alert').length)
                $("#address").after("<div style='margin: 15px' id='alert'><i style='color: red'>Hãy nhập đầy đủ thông tin</i></div>");
        }
        else {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                url: "../profile/update",
                type:'post',
                data:{
                    id: id,
                    gender: gender,
                    name: name,
                    username: username,
                    email: email,
                    phone: phone,
                    address: address
                },
                success: function () {
                    alert("Cập nhật thông tin thành công");
                    window.location.href=window.location.href;
                }
            });
        }
    });
});