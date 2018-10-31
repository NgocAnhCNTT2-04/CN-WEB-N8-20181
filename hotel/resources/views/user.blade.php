<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý người dùng</title>

    <!-- Bootstrap -->
    <link href="{{asset('dist/css/bootstrap.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" media="screen">


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

    <!-- Animo css-->
    <link href="{{asset('plugins/animo/animate+animo.css')}}" rel="stylesheet" media="screen">

    <!-- Picker -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}" />

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery.v2.0.3.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>


    <link href="{{asset('css/switch.css')}}" rel="stylesheet" />

    <script type="text/javascript" src="{{asset('js/userrole.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/userstatus.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/deletehotel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/showhotelinfo.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/updatehotel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/showaddhotel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/addhotel.js')}}"></script>

</head>
<body id="top" class="thebg" >



<div class="container breadcrub">
    <div>
        <a class="homebtn left" href="{{url('')}}"></a>
        <div class="left">
            <ul class="bcrumbs">
                <li>/</li>
                <li><a href="#" class="active">User</a></li>
            </ul>
        </div>
        <a class="backbtn right" href="#"></a>
    </div>
    <div class="clearfix"></div>
    <div class="brlines"></div>
</div>

<!-- CONTENT -->
<div class="container">


    <div class="container mt25 offset-0">


        <!-- CONTENT -->
        <div class="col-md-12 pagecontainer2 offset-0">

            <!-- LEFT MENU -->
            <div class="col-md-1 offset-0">
                <!-- Nav tabs -->
                <ul class="nav profile-tabs">
                    <li class="active">
                        <a href="#profile" data-toggle="tab">
                            <span class="profile-icon"></span>
                            Quản lý người dùng
                        </a></li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- LEFT MENU -->

            <!-- RIGHT CPNTENT -->
            <div class="col-md-11 offset-0">
                <!-- Tab panes from left menu -->
                <div class="tab-content5">

                    <!-- TAB 1 -->
                    <div class="tab-pane padding40 active" id="profile">

                        <div class="clearfix"></div>

                        <span class="size16 bold">Quản lý người dùng</span>



                        <!-- COL 1 -->
                        <div class="col-md-12 offset-0">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th>Trạng thái</th>

                                </tr>

                                    <tr>
                                        <td>1</td>
                                        <td>Hằng</td>
                                        <td>1212</td>
                                        <td>
                                            <label class="switch">
                                                <span class="on">Admin</span>
                                                <input type="checkbox"  class="js-user-role" data-userid="" type="checkbox">
                                            </label>
                                        </td>

                                        <td>
                                            <label class="switch">
                                                <span class="on">On</span>
                                                <input type="checkbox"  class="js-user-status" data-userid="" type="checkbox">

                                            </label>

                                        </td>
                                    </tr>

                            </table>
                        </div>
                        <!-- END OF COL 1 -->

                        <div class="clearfix"></div><br/><br/><br/>

                    </div>
                    <!-- END OF TAB 1 -->

                    <!-- TAB 2 -->

                    <!-- END OF TAB 2 -->

                </div>
                <!-- End of Tab panes from left menu -->

            </div>
            <!-- END OF RIGHT CPNTENT -->

            <div class="clearfix"></div><br/><br/>
        </div>
        <!-- END CONTENT -->



    </div>


</div>
<!-- END OF CONTENT -->




<!-- FOOTER -->




<!-- Javascript  -->
<script src="{{asset('assets/js/js-profile.js')}}"></script>

<!-- Nicescroll  -->
<script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>

<!-- Custom functions -->
<script src="{{asset('assets/js/functions.js')}}"></script>

<!-- Custom Select -->
<script type='text/javascript' src='{{asset('assets/js/jquery.customSelect.js')}}'></script>

<!-- Load Animo -->
<script src="{{asset('plugins/animo/animo.js')}}"></script>

<!-- Picker -->
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>

<!-- Picker -->
<script src="{{asset('assets/js/jquery.easing.js')}}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
</body>
</html>
