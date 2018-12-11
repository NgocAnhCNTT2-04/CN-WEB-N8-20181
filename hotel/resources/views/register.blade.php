<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="{{asset('dist/css/bootstrap.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" media="screen">

    <!-- Animo css-->
    <link href="{{asset('plugins/animo/animate+animo.css')}}" rel="stylesheet" media="screen">

    <link href="{{asset('examples/carousel/carousel.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->

    <!-- Load jQuery -->
    <script src="{{asset('assets/js/jquery.v2.0.3.js')}}"></script>




</head>
<body>
<!-- 100% Width & Height container  -->
<div class="login-fullwidith">

    <!-- Login Wrap  -->
    <div  class="form">
            <form >
                <p class="contact"><label for="name">Tên</label></p>
                <input id="name" name="name" placeholder="Họ và tên" required="" tabindex="1" type="text">
 
                <p class="contact"><label for="email">Email</label></p>
                <input id="email" name="email" placeholder="example@domain.com" required="" type="email">
 
                <p class="contact"><label for="username">Tên đăng nhập</label></p>
                <input id="username" name="username" placeholder="username" required="" tabindex="2" type="text">
 
                <p class="contact"><label for="password">Mật khẩu</label></p>
                <input type="password" id="password" name="password" required="" type="text">
                <p class="contact"><label for="repassword">Nhập lại mật khẩu</label></p>
                <input type="password" id="repassword" name="repassword" required="" type="text">
 
                <select id="gender" class="select-style gender" name="gender">
                <option value="select">Giới tính..</option>
                <option value="m">Nam</option>
                <option value="f">Nữ</option>
                <option value="others">Khác</option>
                </select><br><br>
         
                <p class="contact"><label for="phone">Số điện thoại</label></p>
                <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>
                <p class="contact"><label for="address">Địa chỉ</label></p>
                <input id="address" name="address" placeholder="address" required="" type="text"> <br>
                <a href="./">
                  <input class="buttom" name="back" id="back" tabindex="5" value="Trang chủ">
                </a>
                <input class="buttom" name="register" id="register" tabindex="5" value="Đăng ký" style="margin-left: 195px">
           </form>

   <style type="text/css">
       .form{
            background:#f1f1f1; width:470px; margin:0 auto; padding-left:50px; padding-top:20px;
        }
        .form fieldset{border:0px; padding:0px; margin:0px;}
        .form p.contact { font-size: 12px; margin:0px 0px 3px 0;line-height: 14px; font-family:Arial, Helvetica;}
 
        .form input[type="text"] { width: 400px; }
        .form input[type="email"] { width: 400px; }
        .forminput[type="password"] { width: 400px; }
        .form label { color: #000; font-weight:bold;font-size: 12px;font-family:Arial, Helvetica; }
        .form label.month {width: 135px;}
        .form input, textarea { background-color: rgba(255, 255, 255, 0.4); border: 1px solid rgba(122, 192, 0, 0.15); padding: 7px; font-family: Keffeesatz, Arial; color: #4b4b4b; font-size: 14px; -webkit-border-radius: 5px; margin-bottom: 15px; margin-top: -10px; }
        .form input:focus, textarea:focus { border: 1px solid #ff5400; background-color: rgba(255, 255, 255, 1); }
        .form .select-style {
            -webkit-appearance: button;
            -webkit-border-radius: 2px;
          -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
          -webkit-padding-end: 20px;
          -webkit-padding-start: 2px;
          -webkit-user-select: none;
          background-image: url(images/select-arrow.png),
            -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
          background-position: center right;
          background-repeat: no-repeat;
          border: 0px solid #FFF;
          color: #555;
          font-size: inherit;
          margin: 0;
          overflow: hidden;
          padding-top: 5px;
          padding-bottom: 5px;
          text-overflow: ellipsis;
          white-space: nowrap;}
        .form .gender {
          width:410px;
          }
        .form input.buttom{ background: #4b8df9; display: inline-block; padding: 5px 10px 6px; color: #fbf7f7; text-decoration: none; font-weight: bold; line-height: 1; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; -moz-box-shadow: 0 1px 3px #999; -webkit-box-shadow: 0 1px 3px #999; box-shadow: 0 1px 3px #999; text-shadow: 0 -1px 1px #222; border: none; position: relative; cursor: pointer; font-size: 14px; font-family:Verdana, Geneva, sans-serif;width: 100px}
        .form input.buttom:hover    { background-color: #2a78f6; }

   </style>
</div>

    <!-- End of Login Wrap  -->

</div>
<!-- End of Container  -->

<!-- Javascript  -->
<script src="assets/js/jquery.easing.js"></script>
<!-- Load Animo -->
<script src="plugins/animo/animo.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('js/register.js')}}"></script>
</body>
</html>