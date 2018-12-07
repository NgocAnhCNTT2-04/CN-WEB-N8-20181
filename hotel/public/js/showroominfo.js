$(document).ready(function () {
    $('.btn-search5.right.room').click(function () {
        var room_id = $(this).data('hotelid');
        var divid = '#info'.concat(room_id);

        var e = $(divid)[0];

        if (e.style.display === 'none')
            e.style.display = 'block';
        else
            e.style.display = 'none';
    });
});