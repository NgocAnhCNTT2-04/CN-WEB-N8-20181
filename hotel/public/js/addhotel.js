$(document).ready(function () {
   $('#addhotel').click(function () {
       var type;
       if ($('#Acomodation1').prop('checked'))
           type = 'hotel';
       else
           type = 'resort';

       var name = $('#newname').val();
       var description = $('#newdescription').val();
       var city = $('#newcity').val();
       var address = $('#newaddress').val();
       var distance = $('#newdistance').val();
       var lowest_price = $('#newprice').val();
       var stars = $('#newstars').val();
       var imgfolder = $('#newimgfolder').val();
       var images = $('#newimage').val();
       // var image_upload = new FormData();
       // for(var i = 0; i < $('#newimage')[0].files.length; i ++ ) {
       //      image_upload.append('images[]', images.files[i]);
       // }

       var wifi = $('#newwifi').prop('checked') ? 1 : 0;
       var park = $('#newpark').prop('checked') ? 1 : 0;
       var elevator = $('#newelevator').prop('checked') ? 1 : 0;
       var spa = $('#newspa').prop('checked') ? 1 : 0;
       var pool = $('#newpool').prop('checked') ? 1 : 0;
       var gym = $('#newgym').prop('checked') ? 1 : 0;
       var restaurant = $('#newrestaurant').prop('checked') ? 1 : 0;
       var coffee = $('#newcoffee').prop('checked') ? 1 : 0;
       var bar = $('#newbar').prop('checked') ? 1 : 0;
       var pets = $('#newpets').prop('checked') ? 1 : 0;

       // alert(type);alert(name);alert(description);alert(city);alert(address);alert(distance);
       // alert(lowest_price);alert(stars);alert(imgfolder);alert(wifi);alert(park);alert(elevator);
       // alert(spa);alert(pool);alert(gym);alert(restaurant);alert(coffee);alert(bar);
       // alert(pets);


       if (name === '' || description === '' || city === '' || address === '' || distance === '' || lowest_price === '' || stars === '' || imgfolder === '')
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
               url: "./admin/addhoteltest",
               type:'POST',
               data:{
                   type: type,
                   name: name,
                   description: description,
                   city: city,
                   address: address,
                   distance: distance,
                   lowest_price: lowest_price,
                   stars: stars,
                   imgfolder: imgfolder,
                   wifi: wifi,
                   park: park,
                   elevator: elevator,
                   spa: spa,
                   pool: pool,
                   gym: gym,
                   restaurant: restaurant,
                   coffee: coffee,
                   bar: bar,
                   pets: pets,
                   image_upload: images
               },
               success: function(html){
                   alert('Thêm thành công');
                   window.location.href = window.location.href;
               }
           });
       }
   });
});