$(document).ready(function () {
    $('#register').click(function () {
            var value = $('#gender').val();
            if(value == 'select') {
                var gender = 0;
            }
            else if (value == 'm') {
                var gender = 1;
            }
            else if (value == 'f') {
                var gender = 2;
            }
            else {
                var gender = 3;
            }

        var name = $('#name').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var pass = $('#password').val();
        var repass = $('#repassword').val();
        if (name === "" || username === "" || email === "" || phone === "" || address === "")
        {
            if (!$('#alert').length)
                $("#address").after("<div style='margin: 15px' id='alert'><i style='color: red'>Hãy nhập đầy đủ thông tin</i></div>");
        }
        else if(pass != repass) {
            if (!$('#alert').length)
                $("#repassword").after("<div style='margin: 15px' id='alert'><i style='color: red'>Mật khẩu không trùng khớp</i></div>");
        }
        else if(gender == 0) {
            if (!$('#alert').length)
                $("#gender").after("<div style='margin: 15px' id='alert'><i style='color: red'>Hãy chọn giới tính</i></div>");
        }
        else {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                url: "./profile/register",
                type:'post',
                data:{
                    gender: gender,
                    name: name,
                    username: username,
                    email: email,
                    phone: phone,
                    address: address,
                    password: pass
                },
                success: function (result) {
                    if(result == 0) {
                        alert("Tên đăng nhập hoặc email đã tồn tại.");
                    }
                    else {
                        alert("Đăng ký thành công");
                        window.location.href="./";
                    }
                }
            });
        }
    });
});