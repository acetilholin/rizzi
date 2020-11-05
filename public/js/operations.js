$(document).on('click', '.edit', function () {
    var id = $(this).attr("id");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/offers/" + id,
        method: "GET",
        dataType: "json",
        success: function (data) {
            let offer = data.offer

            $('#update-from').val(moment(offer.date_from).format('DD.MM.Y'))
            $('#update-to').val(moment(offer.date_to).format('DD.MM.Y'))
            $('#offer-id').val(offer.id);
            $('#update-title').val(offer.title);
            $('#update-subtitle').val(offer.subtitle);
            $('#update-active').val(offer.active).change();
            $('#update-pmp').val(offer.price_mp);
            $('#update-ppc').val(offer.price_pc);
            $('#editOffer').modal('show');
        }
    })
});

$('#update-from').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd.mm.yyyy'
});
$('#update-to').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd.mm.yyyy'
});

$(document).ready(function () {
    $('#t-users').tooltip()
    $('#t-stat').tooltip()
    $('#t-offers').tooltip()
    $('#u-state').tooltip()
    $('#u-online').tooltip()
    $('#mp').tooltip()
    $('#pc').tooltip()
});
