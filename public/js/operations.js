$(document).on('click','.edit', function () {
    var id = $(this).attr("id");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/offers/" + id,
        method: "GET",
        dataType: "json",
        success: function (data) {
            let car = data.car
            $('#update-title').val(car.title);
            $('#editOffer').modal('show');
        }
    })
});
