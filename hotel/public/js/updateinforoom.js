$(document).ready(function() {
    $('.bluebtn3.margtop20.room').click(function(){
        var roomid = $(this).val();

        var quality = $('#quality'.concat(roomid)).val();
        var capacity = $('#capacity'.concat(roomid)).val();
        var type_of_bed = $('#typeofbed'.concat(roomid)).val();
        var amount = $('#amount'.concat(roomid)).val();
        var price_per_night = $('#pricepernight'.concat(roomid)).val();

        var internet = $('#internet'.concat(roomid)).prop('checked') ? 1 : 0;
        var air = $('#air'.concat(roomid)).prop('checked') ? 1 : 0;
        var hairdryer = $('#hairdryer'.concat(roomid)).prop('checked') ? 1 : 0;
        var tv = $('#tv'.concat(roomid)).prop('checked') ? 1 : 0;
        var fridge = $('#fridge'.concat(roomid)).prop('checked') ? 1 : 0;
        var microwave = $('#microwave'.concat(roomid)).prop('checked') ? 1 : 0;
        var roomservice = $('#roomservice'.concat(roomid)).prop('checked') ? 1 : 0;
        var cancellation = $('#cancellation'.concat(roomid)).prop('checked') ? 1 : 0;
        var breakfast = $('#breakfast'.concat(roomid)).prop('checked') ? 1 : 0;

        // alert(name);alert(description);alert(city);alert(address);alert(distance);alert(lowest_price);
        // alert(stars);
        // alert(wifi);alert(park);alert(elevator);alert(spa);alert(pool);alert(gym);alert(restaurant);alert(coffee);
        // alert(bar);alert(pets);


        if (quality === '' || capacity === '' || type_of_bed === '' || amount === '' || price_per_night === '')
        {
            if (!$('#alert').length)
                $(this).before("<div style='margin: 15px' id='alert'><i style='color: red'>Hãy nhập đúng và đầy đủ thông tin</i></div>");
        }
        else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: './admin/updateinforoom',
                type:'post',
                data:{
                    roomid: roomid,
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
                success: function(html){
                    alert('Cập nhật thành công');
                    window.location.href = window.location.href;
                }
            });
        }
    });
});