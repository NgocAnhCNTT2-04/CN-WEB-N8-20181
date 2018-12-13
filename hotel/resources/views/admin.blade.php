<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý</title>

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


</head>
<body id="top" class="thebg" >
@include('layouts.header')

<div class="container breadcrub">
    <div>
        <a class="homebtn left" href="{{url('')}}"></a>
        <div class="left">
            <ul class="bcrumbs">
                <li>/</li>
                <li><a href="#" class="active">Profile</a></li>
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
                            Quản lý tài khoản
                        </a></li>
                    <li>
                        <a href="#bookings" data-toggle="tab" onclick="mySelectUpdate()">
                            <span class="bookings-icon"></span>
                            Quản lý khách sạn
                        </a></li>
                    <li>
                        <a href="#rooms" data-toggle="tab" onclick="mySelectUpdate()">
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
                    <div class="tab-pane padding40 active" id="profile">

                        <div class="clearfix"></div>

                        <span class="size16 bold">Quản lý tài khoản</span>



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
                                @foreach($users as $index=>$user)
                                <tr>
                                    <td><?php echo $index+1; ?></td>
                                    <td><?php echo $user->name;?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" <?php if($user->admin) echo "checked" ?> class="js-user-role" data-userid="{{$user->id}}" type="checkbox">
                                            <div class="slider round">
                                                <span class="on">Admin</span>
                                                <span class="off">Member</span>
                                            </div>
                                        </label>
                                    </td>

                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" <?php if($user->status) echo "checked" ?> class="js-user-status" data-userid="{{$user->id}}" type="checkbox">
                                            <div class="slider round">
                                                <span class="on">On</span>
                                                <span class="off">Off</span>
                                            </div>
                                        </label>

                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- END OF COL 1 -->

                        <div class="clearfix"></div><br/><br/><br/>

                    </div>
                    <!-- END OF TAB 1 -->

                    <!-- TAB 2 -->
                    <div class="tab-pane" id="bookings">
                        <div class="padding40">
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

                                <!--<form action="{{ action('HotelController@saveImage') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}-->
                                    <br/>
                                    Thư mục ảnh:<br/>
                                    <input type="text" class="form-control" id="newimgfolder" name = "newimgfolder"/>

                                    <br/>
                                    Hình ảnh khách sạn:<br/>
                                    <input type="file" class="form-control" id="newimage" multiple="multiple" enctype="multipart/form-data" name="image_upload[]"/>
                                


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

                                <button type="submit" class="bluebtn2 margtop20" id="addhotel">Thêm</button>
                                <!--</form>-->
                            </div>

                            <br/>
                            <br/>

                            <span class="dark size18">Danh sách khách sạn</span>

                            <div class="line4"></div>
                            <br/>
                            @foreach($hotels as $ht)
                            <div>
                                <div class="col-md-4 offset-0">
                                    <a href="{{url('/hotel/detail/' . $ht->id)}}"><img alt="" class="left mr20" src="{{asset('images/' . $ht->img_folder . "/main.jpg")}}" width="96px" height="61px"></a>
                                    <a class="dark" href="{{url('/hotel/detail/' . $ht->id)}}"><b>{{$ht->name}}</b></a> /
                                    <span class="dark size12">{{$ht->address}}</span>
                                    <br>
                                    <img alt="" src="{{asset('images/filter-rating-' . $ht->stars . '.png')}}"><br/>
                                    <span class="opensans green bold size14">{{"Từ " . number_format($ht->lowest_price, 0, '.', ',') . " VNĐ"}}</span> <span class="grey"> / đêm</span><br>
                                </div>
                                <div class="col-md-7">
                                <span class="grey"><?php if(strlen($ht->description) > 300) echo substr($ht->description, 0, 300) . '...';
                                    else echo $ht->description; ?></span>
                                </div>
                                <div class="col-md-1 offset-0">
                                    <button type="submit" class="btn-search5 right" data-hotelid = "{{$ht->id}}">Xem</button>
                                </div>
                                <button aria-hidden="true" data-dismiss="alert" class="close mr20 mt10" type="button" value="{{$ht->id}}">×</button>
                                <div class="clearfix"></div>
                                <div class="line4"></div>
                                    <div class="clearfix"></div>

                                    <!-- COL 1 -->
                                    <div class="col-md-12 offset-0" id="{{'info' . $ht->id}}" style="display: none">
                                        <span class="size16 bold">Thông tin khách sạn</span>
                                        <div class="line2"></div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="{{'type' . $ht->id}}" id="{{'Acomodation1' . $ht->id}}" value="option1" <?php if ($ht->type == 'hotel') echo 'checked'; ?>>
                                                Hotel
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="{{'type' . $ht->id}}" id="{{'Acomodation2' . $ht->id}}" value="option2" <?php if ($ht->type == 'resort') echo 'checked'; ?>>
                                                Resort
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>

                                        <br/>
                                        Tên*:
                                        <input type="text" class="form-control" value="{{$ht->name}}" rel="popover" id="{{'name' . $ht->id}}">

                                        <br/>
                                        Mô tả*:
                                        <input type="text" class="form-control" value="{{$ht->description}}" rel="popover" id="{{'description' . $ht->id}}">

                                        <br/>
                                        Thành phố*:
                                        <input type="text" class="form-control" value="{{$ht->city}}" id="{{'city' . $ht->id}}">

                                        <br/>
                                        Địa chỉ:
                                        <input type="text" class="form-control" value="{{$ht->address}}" id="{{'address' . $ht->id}}">

                                        <br/>
                                        Khoảng cách tới trung tâm:<br/>
                                        <input type="number" class="form-control" value="{{$ht->distance_to_centre}}" id="{{'distance' . $ht->id}}" />

                                        <br/>
                                        Giá phòng thấp nhất:<br/>
                                        <input type="number" class="form-control" value="{{$ht->lowest_price}}" id="{{'lowest_price' . $ht->id}}"/>

                                        <br/>
                                        Số sao:<br/>
                                        <input type="number" class="form-control" value="{{$ht->stars}}" id="{{'stars' . $ht->id}}"/>


                                        <br/>
                                        <br/>
                                        <span class="size16 bold">Tiện nghi khách sạn</span>
                                        <div class="line2"></div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'wifi' . $ht->id}}" <?php if ($ht->wifi) echo "checked" ?>>Wifi miễn phí
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'park' . $ht->id}}" <?php if ($ht->park) echo "checked" ?>>Bãi đỗ xe
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'elevator' . $ht->id}}" <?php if ($ht->elevator) echo "checked" ?>>Thang máy
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'spa' . $ht->id}}" <?php if ($ht->spa) echo "checked" ?>>Spa
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'pool' . $ht->id}}" <?php if ($ht->swimming_pool) echo "checked" ?>>Hồ bơi
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'gym' . $ht->id}}" <?php if ($ht->gym) echo "checked" ?>>Phòng gym
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references" id="{{'restaurant' . $ht->id}}" <?php if ($ht->restaurant) echo "checked" ?>>Nhà hàng
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'coffee' . $ht->id}}" <?php if ($ht->coffee) echo "checked" ?>>Quán cà phê
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'bar' . $ht->id}}" <?php if ($ht->bar) echo "checked" ?>>Quầy bar
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'pets' . $ht->id}}" <?php if ($ht->pets) echo "checked" ?>>Cho phép thú nuôi
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>

                                        <button type="submit" class="bluebtn margtop20" id="{{'updatehotel' . $ht->id}}" value="{{$ht->id}}">Cập nhật</button>
                                    </div>
                                    <!-- END OF COL 1 -->

                                    <div class="clearfix"></div></br>
                                </div>

                            @endforeach
                            
                        </div>
                    </div>
                    <!-- END OF TAB 2 -->
                    <!-- START OF TAB 3 -->
                    <div class="tab-pane" id="rooms">
                        <div class="padding40">

                            <button type="submit" class="bluebtn margtop20" id="addroom">Thêm phòng mới</button>

                            <div class="col-md-12 offset-0" id="newroominfor" style="display: none">
                                <div class="line2"></div>
                                <div class="clearfix"></div>

                                <br/>
                                Khách sạn*:
                                <select class="form-control" id="hotel_id">
                                    @foreach($hotels as $ht)
                                    <option value="{{$ht->id}}"><?php echo $ht->name ?></option>
                                    @endforeach
                                </select>
                                <br/>
                                Loại phòng (chất lượng)*:
                                <input type="text" class="form-control" rel="popover" id="newquality">

                                <br/>
                                Sức chứa*:
                                <input type="number" class="form-control" id="newcapacity">

                                <br/>
                                Loại giường*:
                                <input type="text" class="form-control" id="newtypeofbed">

                                <br/>
                                Số lượng phòng*:<br/>
                                <input type="number" class="form-control" id="newamount" />

                                <br/>
                                Giá mỗi đêm*:<br/>
                                <input type="number" class="form-control" id="newpricepernight"/>

                                <br/>
                                Hình ảnh:<br/>
                                <input type="file" class="form-control" id="newimageroom" enctype="multipart/form-data" name="image_upload"/>


                                <br/>
                                <br/>
                                <span class="size16 bold">Tiện nghi phòng</span>
                                <div class="line2"></div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newinternet">Internet
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newair">Điều hoà
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newhairdryer">Máy sấy tóc
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newtv">Tivi
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newfridge">Tủ lạnh
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newmicrowave">Lò vi sóng
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references" id="newroomservice" >Dịch vụ phòng
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newcancellation">Có thể hoàn huỷ
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="references[]" id="newbreakfast">Bữa sáng
                                    </label>
                                </div>
                                <div class="clearfix"></div>

                                <button type="submit" class="bluebtn margtop20" id="addnewroom">Thêm</button>
                            </div>

                            <br/>
                            <br/>

                            <span class="dark size18">Danh sách phòng</span>

                            <div class="line4"></div>
                            <br/>
                            <div class="itemscontainer offset-1" id="roomlist">
                                @foreach($rooms as $room)
                                <div>
                                <div class="padding20">
                                    <div class="col-md-4 offset-0">
                                        <a href="#">
                                            @if ($room->img)
                                                <img style="width: 304.375px;height: 171px;" src="{{asset('images/' . $room->img)}}" alt="" class="fwimg"/>
                                            @else
                                                <img src="{{asset('images/hotel/loading.png')}}" alt="" class="fwimg"/>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-8 offset-0">
                                        <div class="col-md-8 mediafix1">
                                            <h4 class="opensans dark bold margtop1 lh1"><?php echo $room->name . '/' . $room->quality ?></h4>
                                            <?php echo "Sức chứa: " . $room->capacity . " người" ?>
                                            </br>
                                            <?php echo $room->type_of_bed; ?>
                                            <ul class="hotelpreferences2">
                                                @if($room->internet)
                                                    <li class="icohp-internet"></li>
                                                @endif
                                                @if($room->air)
                                                    <li class="icohp-air"></li>
                                                @endif
                                                @if($room->hairdryer)
                                                    <li class="icohp-hairdryer"></li>
                                                @endif
                                                @if($room->tv)
                                                    <li class="icohp-tv"></li>
                                                @endif
                                                @if($room->fridge)
                                                    <li class="icohp-fridge"></li>
                                                @endif
                                                @if($room->microwave)
                                                    <li class="icohp-microwave"></li>
                                                @endif
                                                @if($room->roomservice)
                                                    <li class="icohp-roomservice"></li>
                                                @endif
                                            </ul>
                                            <div class="clearfix"></div>
                                            <ul class="checklist2 margtop10">
                                                @if($room->cancellation)
                                                    <li>Có thể hoàn hủy</li>
                                                @endif
                                                @if($room->breakfast)
                                                    <li>Bao gồm bữa sáng</li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-md-4 center bordertype4">
                                            <span class="opensans green size24"><?php echo number_format($room->price_per_night, 0, '.', ',') . " đ"; ?></span><br/>
                                            <span class="opensans lightgrey size12">giá / 1 đêm</span><br/><br/>
                                            <div class="col-md-1 offset-0" style="margin-left: 100px">
                                            <button type="submit" class="btn-search5 right" data-hotelid = "{{'room'.$room->id}}">Xem</button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <button aria-hidden="true" data-dismiss="alert" class="closeroom mr20 mt10" type="button" value="{{$room->id}}" style="margin-top: -120px">×</button>
                                <div class="line2"></div>
                                <div class="col-md-12 offset-0" id="{{'inforoom' . $room->id}}" style="display: none">
                                        <span class="size16 bold">Thông tin phòng</span>
                                        <div class="line2"></div>
                                        <div class="clearfix"></div>

                                        <br/>
                                        Chất lượng*:
                                        <input type="text" class="form-control" value="{{$room->quality}}" rel="popover" id="{{'quality' . $room->id}}">

                                        <br/>
                                        Sức chứa*:
                                        <input type="number" class="form-control" value="{{$room->capacity}}" rel="popover" id="{{'capacity' . $room->id}}">

                                        <br/>
                                        Loại giường*:
                                        <input type="text" class="form-control" value="{{$room->type_of_bed}}" id="{{'typeofbed' . $room->id}}">

                                        <br/>
                                        Số lượng phòng*:
                                        <input type="number" class="form-control" value="{{$room->amount}}" id="{{'amount' . $room->id}}">

                                        <br/>
                                        Giá mỗi đêm*:<br/>
                                        <input type="number" class="form-control" value="{{$room->price_per_night}}" id="{{'pricepernight' . $room->id}}" />


                                        <br/>
                                        <br/>
                                        <span class="size16 bold">Tiện nghi phòng</span>
                                        <div class="line2"></div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'internet' . $room->id}}" <?php if ($room->internet) echo "checked" ?>>Internet
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'air' . $room->id}}" <?php if ($room->air) echo "checked" ?>>Điều hoà
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'hairdryer' . $room->id}}" <?php if ($room->hairdryer) echo "checked" ?>>Máy sấy tóc
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'tv' . $room->id}}" <?php if ($room->tv) echo "checked" ?>>Tivi
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'fridge' . $room->id}}" <?php if ($room->fridge) echo "checked" ?>>Tủ lạnh
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'microwave' . $room->id}}" <?php if ($room->microwave) echo "checked" ?>>Lò vi sóng
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references" id="{{'roomservice' . $room->id}}" <?php if ($room->roomservice) echo "checked" ?>>Dịch vụ phòng
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'cancellation' . $room->id}}" <?php if ($room->cancellation) echo "checked" ?>>Có thể hoàn huỷ
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="references[]" id="{{'breakfast' . $room->id}}" <?php if ($room->breakfast) echo "checked" ?>>Bữa sáng
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>

                                        <button type="submit" class="bluebtn3 margtop20 room" id="" value="{{$room->id}}">Cập nhật</button>
                                </div>
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                    </div>
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
@include('layouts.footer2')

<!-- Javascript  -->
<script src="{{asset('assets/js/js-profile.js')}}"></script>
<script type="text/javascript" src="{{asset('js/showhotelinfo.js')}}"></script>
<script type="text/javascript" src="{{asset('js/updatehotel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/showaddhotel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/showroominfo.js')}}"></script>
<script type="text/javascript" src="{{asset('js/showaddroom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/addhotel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/changeuserstatus.js')}}"></script>
<script type="text/javascript" src="{{asset('js/changeuserrole.js')}}"></script>
<script type="text/javascript" src="{{asset('js/deletehotel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/updateinforoom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/addroom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/deleteroom.js')}}"></script>

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
