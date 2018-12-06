<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý khách sạn</title>

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


    <link href="{{asset('css/switch.css')}}" rel="stylesheet" />

    <script type="text/javascript" src="{{asset('js/showhotelinfo.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/showaddhotel.js')}}"></script>

</head>
<body id="top" class="thebg" >
<div class="container breadcrub">
    <div>
        <a class="homebtn left" href="#"></a>
        <div class="left">
            <ul class="bcrumbs">
                <li>/</li>
                <li><a href="#" class="active">Admin</a></li>
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
                        <a href="#bookings" data-toggle="tab">
                            <span class="bookings-icon"></span>
                            Quản lý phòng khách sạn
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
                    <!-- END OF TAB 1 -->

                    <!-- TAB 2 -->
                    <div class="tab-pane active" id="bookings">
                        <div class="padding40">

                            <span class="dark size18">Danh sách khách sạn</span>

                            <div class="line4"></div>
                            <br/>
                                <div class="col-md-4 offset-0">
                                    <a href="#"><img alt="" class="left mr20" src="{{asset('images/hotel/1/main.jpg')}}" width="96px" height="61px"></a>
                                    <a class="dark" href="#"><b>"Khách sạn 1"</b></a> /
                                    <span class="dark size12">Địa chỉ</span>
                                    <br>
                                    <img alt="" src="{{asset('images/filter-rating-5.png')}}"><br/>
                                    <span class="opensans green bold size14">Từ 1000000</span> <span class="grey"> / đêm</span><br>
                                </div>
                                <div class="col-md-7">
                                <span class="grey">Mô tả</span>
                                </div>
                                <div class="col-md-1 offset-0">
                                    <button type="submit" class="btn-search5 right" data-hotelid = "idhotel">Xem</button>
                                </div>
                                <button aria-hidden="true" data-dismiss="alert" class="close mr20 mt10" type="button" id="delete" value="">×</button>
                                <div class="clearfix"></div>
                                <div class="line4"></div>
                                    <div class="clearfix"></div>

                                    <!-- COL 1 -->
                                    <div class="col-md-12 offset-0" id="infoidhotel" style="display: none">
                                        <span class="size16 bold">Thông tin khách sạn</span>
                                        <div class="line2"></div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="kind1" id="idkind1" value="option1">
                                                Hotel
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="kind2" id="idkind2" value="option2">
                                                Resort
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>

                                        <br/>
                                        Tên*:
                                        <input type="text" class="form-control" value="Tên khách sạn" rel="popover" id="idhotel">

                                        <br/>
                                        Mô tả*:
                                        <input type="text" class="form-control" value="Mô tả" rel="popover" id="description">

                                        <br/>
                                        Thành phố*:
                                        <input type="text" class="form-control" value="Thành phố" id="idcity">

                                        <br/>
                                        Địa chỉ:
                                        <input type="text" class="form-control" value="Địa chỉ" id="idaddres">

                                        <br/>
                                        Khoảng cách tới trung tâm:<br/>
                                        <input type="number" class="form-control" value="Khoảng cách tới trung tâm" id="iddistance" />

                                        <br/>
                                        Giá phòng thấp nhất:<br/>
                                        <input type="number" class="form-control" value="Giá phòng thấp nhất" id="idlowest"/>

                                        <br/>
                                        Số sao:<br/>
                                        <input type="number" class="form-control" value="Số sao" id="idstar"/>


                                        <br/>
                                        <br/>
                                        <span class="size16 bold">Tiện nghi khách sạn</span>
                                        <div class="line2"></div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="wifi" >Wifi miễn phí
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="park" >Bãi đỗ xe
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="elevator">Thang máy
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="spa">Spa
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="pool">Hồ bơi
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="gym">Phòng gym
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references" id="restaurant">Nhà hàng
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="coffee">Quán cà phê
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="bar">Quầy bar
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="pets">Cho phép thú nuôi
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>

                                        <button type="submit" class="bluebtn margtop20" id="updatehotel" value="id">Cập nhật</button>
                                    </div>
                                    <!-- END OF COL 1 -->

                                    <div class="clearfix"></div></br>

                            <button type="submit" class="bluebtn margtop20" id="addht">Thêm khách sạn mới</button>

                            <div class="col-md-12 offset-0" id="newinfor" style="display: none">
                                <div class="line2"></div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="type" id="Acomodation1" value="option1" checked>
                                        Hotel
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="type" id="Acomodation2" value="option2" >
                                        Resort
                                    </label>
                                </div>
                                <div class="clearfix"></div>

                                <br/>
                                Tên*:
                                <input type="text" class="form-control" rel="popover" id="newname">

                                <br/>
                                Mô tả*:
                                <input type="text" class="form-control" rel="popover" id="newdescription">

                                <br/>
                                Thành phố*:
                                <input type="text" class="form-control" id="newcity">

                                <br/>
                                Địa chỉ:
                                <input type="text" class="form-control" id="newaddress">

                                <br/>
                                Khoảng cách tới trung tâm:<br/>
                                <input type="number" class="form-control" id="newdistance" />

                                <br/>
                                Giá phòng thấp nhất:<br/>
                                <input type="number" class="form-control" id="newprice"/>

                                <br/>
                                Số sao:<br/>
                                <input type="number" class="form-control" id="newstars"/>

                                <br/>
                                Thư mục ảnh:<br/>
                                <input type="text" class="form-control" id="newimgfolder"/>


                                <br/>
                                <br/>
                                <span class="size16 bold">Tiện nghi khách sạn</span>
                                <div class="line2"></div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newwifi">Wifi miễn phí
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newpark">Bãi đỗ xe
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newelevator">Thang máy
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newspa">Spa
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newpool">Hồ bơi
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newgym">Phòng gym
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references" id="newrestaurant" >Nhà hàng
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newcoffee">Quán cà phê
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newbar">Quầy bar
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newpets">Cho phép thú nuôi
                                    </label>
                                </div>
                                <div class="clearfix"></div>

                                <button type="submit" class="bluebtn margtop20" id="addhotel">Thêm</button>
                            </div>
                        </div>
                    </div>
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
