$(document).ready(function () {
   $('#addnewroom').click(function () {
       var hotel_id = $('#hotel_id').val();
       var quality = $('#newquality').val();
       var capacity = $('#newcapacity').val();
       var type_of_bed = $('#newtypeofbed').val();
       var amount = $('#newamount').val();
       var price_per_night = $('#newpricepernight').val();
       var images = $('#newimageroom')[0];
       var image_upload = new FormData();
       for(var i = 0; i < $('#newimageroom')[0].files.length; i ++ ) {
            image_upload.append('images[]', images.files[i]);
       }

       image_upload.append('hotelid', hotel_id);

       var internet = $('#newinternet').prop('checked') ? 1 : 0;
       var air = $('#newair').prop('checked') ? 1 : 0;
       var hairdryer = $('#newhairdryer').prop('checked') ? 1 : 0;
       var tv = $('#newtv').prop('checked') ? 1 : 0;
       var fridge = $('#newfridge').prop('checked') ? 1 : 0;
       var microwave = $('#newmicrowave').prop('checked') ? 1 : 0;
       var roomservice = $('#newroomservice').prop('checked') ? 1 : 0;
       var cancellation = $('#newcancellation').prop('checked') ? 1 : 0;
       var breakfast = $('#newbreakfast').prop('checked') ? 1 : 0;

       // alert(type);alert(name);alert(description);alert(city);alert(address);alert(distance);
       // alert(lowest_price);alert(stars);alert(imgfolder);alert(wifi);alert(park);alert(elevator);
       // alert(spa);alert(pool);alert(gym);alert(restaurant);alert(coffee);alert(bar);
       // alert(pets);


       if (quality === '' || capacity === '' || type_of_bed === '' || amount === '' || price_per_night === '' || images === null)
       {
           if (!$('#alert').length)
               $(this).before("<div style='margin: 15px' id='alert'><i style='color: red'>Hãy nhập đầy đủ thông tin</i></div>");
       }
       else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           $.ajax({
               url: "./admin/addnewroom",
               type:'post',
               data:{
                   hotel_id: hotel_id,
                   quality: quality,
                   capacity: capacity,
                   type_of_bed: type_of_bed,
                   amount: amount,
                   price_per_night: price_per_night,
                   internet: internet,
                   air: air,
                   hairdryer: hairdryer,
                   tv: tv,
                   fridge: fridge,
                   microwave: microwave,
                   roomservice: roomservice,
                   cancellation: cancellation,
                   breakfast: breakfast
               },
               success: function(result){
                   $.ajax({
                     url: "./admin/saveimageroom",
                     type:'post',
                     data: image_upload,
                     processData: false,
                     contentType: false,
                      success: function(res) {
                        if(res == 1){
                        alert('Thêm thành công');
                        window.location.href = window.location.href;
                        }
                        else {
                          alert('Thêm thất bại');
                        }
                      }
                     });
               }
           });
       }
   });
});