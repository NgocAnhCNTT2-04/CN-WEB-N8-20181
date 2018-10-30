$(document).ready(function () {
    $('.delete-fav').click(function () {
        alert('12345');
        var hotel_id = $(this).val();
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        $.ajax({
            url: "../profile/favorite/delete",
            type:'post',
            data:{
                hotel_id: hotel_id
            },
            success: function () {
                //window.location.href = window.location.href;
            }
        });
    });
});